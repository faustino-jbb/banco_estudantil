<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', "HomeController@index")->name('home');

Route::group(['prefix' => "user"], function () {
    Route::get('/login', "UserController@login")->name('login');
    Route::get('/logout', "UserController@logout")->name('logout');
    Route::post('/logar', "UserController@logar")->name('logar');
    Route::get('/create', "UserController@create");
    Route::get('/contrat', "UserController@contrat");
    Route::post('/store', "UserController@store");
});

Route::group(['prefix' => "estudantes", 'middleware' => "adminAuth"], function () {
    Route::get('/', "EstudanteController@index");
    Route::get('/create', "EstudanteController@create");
    Route::get('/show/{id}', "EstudanteController@show");
    Route::get('/edit/{id}', "EstudanteController@edit");
    Route::post('/store', "EstudanteController@store");
    Route::put('/update/{id}', "EstudanteController@update");
});

Route::group(['prefix' => "servicos", 'middleware' => "adminAuth"], function () {
    Route::get('/', "ServicoController@index");
    Route::get('/create', "ServicoController@create");
    Route::get('/show/{id}', "ServicoController@show");
    Route::get('/edit/{id}', "ServicoController@edit");
    Route::post('/store', "ServicoController@store");
    Route::put('/update/{id}', "ServicoController@update");
});

Route::group(['prefix' => "contas", 'middleware' => "adminAuth"], function () {
    Route::get('/', "ContaController@index");
    Route::get('/create', "ContaController@create");
    Route::get('/show/{id}', "ContaController@show");
    Route::get('/edit/{id}', "ContaController@edit");
    Route::post('/store', "ContaController@store");
    Route::put('/update/{id}', "ContaController@update");
    Route::get('/deposito/{id}', "ContaController@deposito");
    Route::put('/depositar/{id}', "ContaController@depositar");
    Route::put('/activar/{id}', "ContaController@activar");
    Route::get('/activate/{id}', "ContaController@activate");
    Route::get('/perfil/{id}', "ContaController@perfil");
});

Route::group(['prefix' => "pagamentos", 'middleware' => "estudanteAuth"], function () {
    Route::get('/', "PagamentoController@index");
    Route::get('/create/{id}', "PagamentoController@create");
    Route::get('/show/{id}', "PagamentoController@show");
    Route::get('/edit/{id}', "PagamentoController@edit");
    Route::put('/store/{id}', "PagamentoController@store");
    Route::put('/update/{id}', "PagamentoController@update");
});

Route::group(['prefix' => "transferencias", 'middleware' => "estudanteAuth"], function () {
    Route::get('/', "TransferenciaController@index");
    Route::get('/create/{id}', "TransferenciaController@create");
    Route::get('/show/{id}', "TransferenciaController@show");
    Route::get('/edit/{id}', "TransferenciaController@edit");
    Route::post('/store', "TransferenciaController@store");
    Route::put('/update/{id}', "TransferenciaController@update");
});

Route::group(['prefix'=>"descontos", 'middleware'=>"adminAuth"], function(){
    Route::get('/', "DescontosController@index");
    Route::get('/create', "DescontosController@create");
    Route::get('/show/{id}', "DescontosController@show");
    Route::get('/edit/{id}', "DescontosController@edit");
    Route::post('/store', "DescontosController@store");
    Route::put('/update/{id}', "DescontosController@update");
    Route::get('/cobranca/{id}', "DescontosController@cobranca");
    Route::put('/cobrar/{id}', "DescontosController@cobrar");
});

Route::get('/contas/movimentos/{id}', "ContaController@movimentos")->middleware('auth');
Route::get('/contas/estado/{id}', "ContaController@estado")->middleware('auth');
Route::get('/contas/cancelar/', "ContaController@cancelar")->middleware('auth');

/*ajax request*/
Route::group(['prefix' => "ajax"], function () {
    Route::post('getMunicipios', "AjaxRequestController@getMunicipios")->name('getMunicipios');

});


/*Route::get('/sms', function(){
    $data = [
        'email' => "mr1Normaliii@gmail.com",
    ];
    try {
        Mail::send('email.mail', $data, function ($message) use ($data) {
            $message->from('coutinho77Kombo@gmail.com', 'Banco BANC');
            $message->subject('Mudança do preço dos Serviços');
            $message->to($data['email']);
        });
        echo "enviado";
    } catch (\Exception $e) {
        echo $e->getMessage();
    }

});*/