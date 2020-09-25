<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Controller@index');

Auth::routes();

// Route::get('/teste', function () {
//    dd( Hash::make(123123));
// });

Route::get('/gerar-treinamento', 'TreinamentoController@telaGeraTreinamento');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
   \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::group(['middleware' => ['auth','web','admin'], 'prefix' =>'/admin'], function() {
    Route::get('/', 'AdminController@index')->name('Principal');
    Route::get('/usuarios', 'AdminController@getUsuarios')->name('Usuarios');
    Route::get('/arquivos', 'AdminController@arquivos')->name('Arquivos');
    
    Route::post('/usuarios', 'AdminController@getUsuarios')->name('Usuarios');
    Route::get('/usuarios/{id}', 'AdminController@removeUser')->name('removeUser');

    Route::get('/atividades', 'AdminController@getAtividades')->name('Atividades');
    Route::post('/atividades', 'AdminController@getAtividades')->name('Atividades');

    Route::get('/categorias', 'AdminController@getCategorias')->name('Categorias');
    Route::get('/categorias/nova', 'AdminController@novaCategoria')->name('Categoria');
    Route::get('/categorias/editar/{id}', 'AdminController@novaCategoria')->name('editarCategoria');
    Route::post('/categorias/nova', 'AdminController@salvaCategoria')->name('salvaCategoria');

    Route::get('/paginas', 'AdminController@getPaginas')->name('Paginas');
    Route::get('/paginas/nova', 'AdminController@novaPagina')->name('Pagina');
    Route::get('/paginas/editar/{id}', 'AdminController@novaPagina')->name('editarPagina');
    Route::post('/paginas/nova', 'AdminController@salvaPagina')->name('salvaPagina');

    Route::get('/medalhas', 'AdminController@getMedalhas')->name('Medalhas');
    Route::get('/medalhas/nova', 'AdminController@novaMedalha')->name('Medalha');
    Route::get('/medalhas/editar/{id}', 'AdminController@novaMedalha')->name('editarMedalha');
    Route::post('/medalhas/nova', 'AdminController@salvaMedalha')->name('salvaMedalha');
    Route::post('/desafio', 'HomeController@participaDesafio')->name('participaDesafio');

    Route::get('/desafio/users/{id}', 'AdminController@verUsuariosDesafio')->name('verUsuariosDesafio');
    Route::post('/desafio/users/{id}', 'AdminController@verUsuariosDesafio')->name('verUsuariosDesafio');
});
Route::group(['middleware'=>'auth'],function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/nova-atividade', 'HomeController@novaAtividade')->name('novaAtividade');
    Route::get('/editar-atividade/{id}', 'HomeController@novaAtividade')->name('editarAtividade');
    Route::get('/deletar-atividade/{id}', 'HomeController@deletarAtividade')->name('deletarAtividade');
    Route::post('/salva-atividade', 'HomeController@salvaAtividade')->name('salvaAtividade');
    Route::get('/perfil', 'HomeController@perfil')->name('perfil');
    Route::post('/salva-perfil', 'HomeController@salvaPerfil')->name('salvaPerfil');
});

Route::get('/desafio/ver/{nome}', 'HomeController@desafio')->name('desafioHome');
Route::get('/desafio/{nome}', 'GuestController@desafio')->name('desafio');
Route::get('/como-funciona', 'HomeController@comoFunciona')->name('comoFunciona');
Route::get('/historia-do-desafio', 'HomeController@historia')->name('historia');


Route::get('/ranking', 'HomeController@ranking')->name('ranking');


Route::get('facebook', function () {
    return view('auth.login');
});
Route::get('teste-gui', function () {
    $user = \App\User::find(1);
    $now = \Carbon\Carbon::now();
    //dd($user->updated_at->diffInHours($now));
    $query    = 'https://www.strava.com/api/v3/oauth/token';
    $client   = new \GuzzleHttp\Client();
    $response = $client->request('POST', $query, [
        'form_params' => [
            'client_id' => '29476',
            'client_secret' => '01a800c3b9dec6c6f46735dbca449ad5d5f5cd6a',
            'grant_type' => 'refresh_token',
            'refresh_token' => $user->strava_refresh_token,
        ]
    ]);
    dd(json_decode($response->getBody()));
});
Route::get('auth/facebook', 'Auth\SocialController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\SocialController@handleFacebookCallback');

Route::get('auth/strava', 'Auth\SocialController@redirectToStrava');
Route::get('auth/strava/callback', 'Auth\SocialController@handleStravaCallback');
Route::post('strava/webhook', 'Auth\SocialController@handleStravaWebhook');
Route::get('strava/webhook', 'Auth\SocialController@handleStravaWebhook');

