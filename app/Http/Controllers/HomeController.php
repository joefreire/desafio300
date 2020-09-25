<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\DesafioUser;
use App\Medalhas;
use App\Peso;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use Socialite;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth::user();
        if(empty($user->strava_refresh_token) && !empty($user->strava_id)){
            return Socialite::driver('strava')->scopes(['read_all', 'activity:read_all'])->redirect();
        }

        $atividades = Atividade::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate('10');

        return view('home')
        ->with('atividades', $atividades);
    }

    public function comoFunciona()
    {

        return view('comoFunciona');
    }
    public function desafio(Request $request)
    {
        if (!isset($request->nome)) {
            return redirect('home')->with('error', "Desafio não existe");
        } else {
            $desafio = Medalhas::where('slug', $request->nome)->first();
            if (!empty($desafio)) {
                $usersDesafio = DesafioUser::with('user')->where('medalha_id', $desafio->id)->get();
                return view('desafio')
                ->with('usersDesafio', $usersDesafio)
                ->with('desafio', $desafio);
            } else {
                return redirect('home')->with('error', "Desafio não existe");
            }
        }

    }
    public function historia()
    {

        return view('historia');
    }
    public function ranking()
    {

        $distancia = Atividade::with('user')->whereYear('start_date_local', '=', date('Y'))
        ->select( \DB::raw('sum( distance ) as distancia'), 'user_id' )
        ->where('distance','>',0)
        ->groupBy('user_id')
        ->orderBy('distancia','desc')
        ->take(10)->get();

        $tempo = Atividade::with('user')->whereYear('start_date_local', '=', date('Y'))
        ->select( \DB::raw('sum( moving_time ) as tempo'), 'user_id' )
        ->where('moving_time','>',0)
        ->groupBy('user_id')
        ->orderBy('tempo','desc')
        ->take(10)->get();

        $sequencia = Atividade::with('user')->whereYear('start_date_local', '=', date('Y'))
        ->select( \DB::raw('COUNT(DISTINCT DATE(created_at)) as dias'), 'user_id' )
        ->where('moving_time','>',0)
        //->where('distance','>',0)
        ->groupBy('user_id')
        ->orderBy('dias','desc')
        ->take(10)->get();
        //dd($sequencia);
        return view('ranking')
        ->with('distancia', $distancia)
        ->with('sequencia', $sequencia)
        ->with('tempo', $tempo);
    }
    public function participaDesafio(Request $request)
    {
        if (isset($request->desafio_id)) {
            $desafio = DesafioUser::where('user_id', Auth::id())->where('medalha_id', $request->desafio_id)->first();
            if (empty($desafio)) {
                $participaDesafio = DesafioUser::create([
                    'user_id'    => Auth::id(),
                    'medalha_id' => $request->desafio_id,
                    'concluido'  => 'Não',
                ]);
                $desafio = Medalhas::where('id', $request->desafio_id)->first();
                \Mail::to(Auth::user()->email)->send(new \App\Mail\InscricaoDesafio(Auth::user(), $desafio));
                return redirect()->route('home')->with('success', 'Inscrito no desafio com sucesso');
            } else {
                return redirect()->route('home')->with('error', 'Inscrito no desafio já realizada');
            }

        }
        return redirect()->route('home')->with('error', 'Paramêtros incorretos');
    }
    public function novaAtividade($id = null)
    {
        if ($id != null) {
            $Atividade = Atividade::find($id)->toArray();
            foreach ($Atividade as $key => $value) {
                Session::flash('_old_input.' . $key, $value);
            }
        }
        return view('novaAtividade');
    }
    public function deletarAtividade($id)
    {

        $Atividade = Atividade::find($id);
        $Atividade->delete();

        return redirect()->route('home')->with('success', 'Atividade deletada com sucesso');
    }
    public function salvaAtividade(Request $request)
    {
        $rules = [
            'nome'             => 'required|max:255',
            'tipo_atividade'   => 'required',
            'distance'         => 'nullable|min:0',
            'hora'             => 'nullable|min:0',
            'minutos'          => 'nullable|min:0',
            'segundos'         => 'nullable|min:0',
            'start_date_local' => 'nullable|date_format:d/m/Y',
        ];
        $mensagens = [
        ];

        $this->validate($request, $rules, $mensagens);
        $user = Auth::user();
        if (isset($requert->peso)) {
            if ($request->peso != Auth::user()->peso()) {

                $peso = Peso::create([
                    'user_id' => $user->id,
                    'peso'    => $request->peso,
                ]);
            }
        }
        if (isset($requert->altura)) {
            $user->altura = $request->altura;
            $user->save();
        }
        if ($request->distance > 0.00) {
            $distancia = $request->distance * 1000;
        } else {
            $distancia = 0;
        }

        $atividade = Atividade::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'user_id'          => $user->id,
                'name'             => $request->nome,
                'strava_activity'  => null,
                'type'             => $request->tipo_atividade,
                'start_date_local' => (isset($request->start_date_local) ? \Carbon\Carbon::createFromFormat('d/m/Y', $request->start_date_local)->toDateTimeString() : \carbon\carbon::now()),
                'distance'         => (int) $distancia,
                'moving_time'      => ($request->segundos + $request->minutos * 60 + $request->hora * 3600),
                'elapsed_time'     => ($request->segundos + $request->minutos * 60 + $request->hora * 3600),
            ]);
        return redirect()->route('home')->with('success', 'Atividade salva com sucesso');

    }
    public function perfil()
    {
        return view('perfil');
    }
    public function salvaPerfil(Request $request)
    {
        $rules = [
            'nome'  => 'required|max:255',
            'image' => 'nullable|mimes:jpeg,bmp,png,jpg',
        ];
        $mensagens = [
        ];
        //dd($request->image, $request->file('image'));

        $this->validate($request, $rules, $mensagens);
        $user = Auth::user();
        if ($request->password != '') {
            if ($request->password == $request->password_confirmation) {
                $user->update([
                    'password' => \Hash::make($request->password),
                ]);
            } else {
                return redirect()->route('perfil')->with('error', 'Você deve digitar as senhas iguais');
            }
        }

        if ($request->hasFile('image')) {
            $file      = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename  = time() . '.' . $extension;
            $file->move('uploads/feed/', $filename);
            $user->avatar = url('uploads/feed/') . '/' . $filename;
        }

        $user->nome          = $request->nome;
        $user->altura        = $request->altura;
        $user->dt_nascimento = $request->dt_nascimento;
        $user->estado        = $request->estado;
        $user->cidade        = $request->cidade;
        $user->save();

        if ($request->peso != Auth::user()->peso()) {

            $peso = Peso::create([
                'user_id' => $user->id,
                'peso'    => $request->peso,
            ]);
        }

        return redirect()->route('home')->with('success', 'Perfil Atualizado com sucesso');
    }
}
