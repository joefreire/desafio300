<?php

namespace App\Http\Controllers\Auth;

use App\Atividade;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Socialite;

class SocialController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function redirectToStrava()
    {
/*        $clientId = "secret";
        $clientSecret = "secret";
        $redirectUrl = "http://yourdomain.com/api/redirect";
        $additionalProviderConfig = ['scope' => 'read_all,activity:read'];
        $config = new \SocialiteProviders\Manager\Config($clientId, $clientSecret, $redirectUrl, $additionalProviderConfig);*/
        return Socialite::driver('strava')->scopes(['read_all', 'activity:read_all'])->redirect();
    }
    public function handleStravaWebhook(Request $request)
    {
        \Log::debug($request->all());
        /* quando precisa validar um caminho de um webhook
        echo json_encode(array('hub.challenge' => $request['hub_challenge']));
         */
        if (isset($request['hub_challenge'])) {
            //echo json_encode(array('hub.challenge' => $request['hub_challenge']));
        } else {
            if (isset($request['aspect_type']) && $request['aspect_type'] == 'create') {
                $user = User::where('strava_id', $request['owner_id'])->first();
                //falta verificar se o usuario nao logou nas ultimas 6 horas
                //update_at < 6 horas
                $now = \Carbon\Carbon::now();
                if (!empty($user) && $user->updated_at->diffInHours($now) > 6 && !empty($user->strava_refresh_token) ){
                	\Log::debug('refresh token  '.$user->id);
                    $query    = 'https://www.strava.com/api/v3/oauth/token';
                    try {
                        $client   = new Client();
                        $response = $client->request('POST', $query, [
                            'form_params' => [
                                'client_id' => '29476',
                                'client_secret' => '01a800c3b9dec6c6f46735dbca449ad5d5f5cd6a',
                                'grant_type' => 'refresh_token',
                                'refresh_token' => $user->strava_refresh_token,
                            ]
                        ]);
                        if ($response->getStatusCode() == '200') {
                            $novoToken = json_decode($response->getBody());
                            $user->strava_refresh_token = $novoToken->refresh_token;
                            $user->strava_expire_at = $novoToken->expires_in;
                            $user->strava_token = $novoToken->access_token;
                            $user->save();
                        }
                    } catch (Exception $e) {
                        \Log::error('ERRO ATUALIZAR TOKEN '.json_encode($user));
                    }
                }
                if(empty($user->strava_token)){
                    \Log::error('ERRO USER SEM TOKEN '.json_encode($user));
                    exit;
                }
                try {
                    $query    = 'https://www.strava.com/api/v3/activities/' . $request['object_id'] . '?include_all_efforts=false';
                    $client   = new Client();
                    $response = $client->request('GET', $query, [
                        'headers' => [
                            'Authorization' => 'Bearer ' . $user->strava_token,
                        ],
                    ]);
                    \Log::debug('pegar atividade usuario '.$user->id . 'atividade '. $request['object_id']);
                    if ($response->getStatusCode() == '200') {
                        $resultado = json_decode($response->getBody());
                        \Log::debug(json_encode($resultado));
                        if (isset($resultado->id)) {
                            $atividade = Atividade::create([
                                'user_id'              => $user->id,
                                'name'                 => $resultado->name,
                                'distance'             => $resultado->distance,
                                'elapsed_time'         => $resultado->elapsed_time,
                                'moving_time'          => $resultado->moving_time,
                                'type'                 => $resultado->type,
                                'strava_activity'      => $resultado->id,
                                'start_date_local'     => $resultado->start_date_local,
                                'start_latlng'         => json_encode($resultado->start_latlng),
                                'end_latlng'           => json_encode($resultado->end_latlng),
                                'total_elevation_gain' => $resultado->total_elevation_gain,
                                'location_city'        => $resultado->location_city,
                                'location_state'       => $resultado->location_state,
                                'location_country'     => $resultado->location_country,
                                'map_id'               => $resultado->map->id,
                                'map_polyline'         => $resultado->map->polyline,
                                'private'              => $resultado->private,
                                'visibility'           => $resultado->visibility,
                                'average_speed'        => $resultado->average_speed,
                                'calories'             => $resultado->calories,
                            ]);
                        }
                    }

                } catch (\GuzzleHttp\Exception\ClientException $e) {
                    $response             = $e->getResponse();
                    $responseBodyAsString = $response->getBody()->getContents();
                    \Log::debug($responseBodyAsString);
                }
            }

        }

    }
    public function handleStravaCallback(Request $request)
    {

        //dd($request->all(),Socialite::with('strava')->user());
        try {
            $strava = Socialite::driver('strava')->user();

            $Usuario = User::find(Auth::id());
/*            if (empty($Usuario->avatar)) {
                $Usuario->avatar = $strava->avatar;
            } */  
            $Usuario->strava_id    = $strava->getId();
            $Usuario->strava_token = $strava->token;
            $Usuario->strava_expire_at = $strava->accessTokenResponseBody['expires_in'];
            $Usuario->strava_refresh_token = $strava->refreshToken;
            $Usuario->save();

            $user = $Usuario;

            $hoje = \Carbon\carbon::Now()->timestamp;

            try {
                $query    = 'https://www.strava.com/api/v3/athlete/activities?after=1546300800&per_page=200&before=' . $hoje . '?include_all_efforts=false';
                $client   = new Client();
                $response = $client->request('GET', $query, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $user->strava_token,
                    ],
                ]);

                if ($response->getStatusCode() == '200') {
                    $resultados = json_decode($response->getBody());

                    \Log::debug(json_encode($resultados));
                    foreach ($resultados as $resultado) {

                        if (isset($resultado->id)) {
                            $Atividade = Atividade::where('strava_activity', $resultado->id)->where('user_id', $user->id)->first();

                            if (empty($Atividade)) {
                                $atividade = Atividade::create([
                                    'user_id'              => $user->id,
                                    'name'                 => $resultado->name,
                                    'distance'             => $resultado->distance,
                                    'elapsed_time'         => $resultado->elapsed_time,
                                    'moving_time'          => $resultado->moving_time,
                                    'type'                 => $resultado->type,
                                    'strava_activity'      => $resultado->id,
                                    'start_date_local'     => $resultado->start_date_local,
                                    'start_latlng'         => json_encode($resultado->start_latlng),
                                    'end_latlng'           => json_encode($resultado->end_latlng),
                                    'total_elevation_gain' => $resultado->total_elevation_gain,
                                    'location_city'        => $resultado->location_city,
                                    'location_state'       => $resultado->location_state,
                                    'location_country'     => $resultado->location_country,
                                    'map_id'               => (isset($resultado->map)?$resultado->map->id:null),
                                    'map_polyline'         => (isset($resultado->map)?$resultado->map->summary_polyline:null),
                                    'private'              => $resultado->private,
                                    'visibility'           => $resultado->visibility,
                                    'average_speed'        => $resultado->average_speed,
                                    'calories'             => (isset($resultado->calories)?$resultado->calories:null),
                                ]);
                            }
                        }
                    }
                }
            } catch (\GuzzleHttp\Exception\ClientException $e) {
                $response             = $e->getResponse();
                $responseBodyAsString = $response->getBody()->getContents();
                \Log::debug($responseBodyAsString);
            }
            return redirect()->route('home')->with('sucess', 'Usuario do strava vinculado');
        } catch (Exception $e) {
            \Log::error($e->getMessage().' '. $e->getLine());
            return redirect()->route('home')->with('error', 'Erro ao acessar com o strava ' . $e->getMessage(). ' '. $e->getLine());
        }
    }
    public function handleFacebookCallback()
    {
        try {
            $user                  = Socialite::driver('facebook')->user();
            $create['nome']        = $user->getName();
            $create['email']       = $user->getEmail();
            $create['facebook_id'] = $user->getId();
            $create['avatar']      = $user->getAvatar();
            $create['password']    = 'facebook';

            $userModel   = new User;
            $createdUser = $userModel->addNew($create);
            Auth::loginUsingId($createdUser->id);

            return redirect()->route('home');
        } catch (Exception $e) {
            return redirect('/')->with('error', 'Erro ao acessar com o facebook ' . $e->getMessage());
        }
    }
    public function getAtividadesPassadas($user)
    {

    }
}
