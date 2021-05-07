<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\RoleController;
use Illuminate\Auth\Middleware;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pi',function(){
    return view('pi');
});

Route::get('/home',function(){
    return view('home');
});

Route::get('/avisos', function(){
    return view('avisos', [ 'nome' => 'Lucas Santos Silva', 
                            'mostrar' => true,
                            'avisos' => [[ 'id' => 1,
                                          'texto' => 'O pagamento será antecipado esse mês para o dia 1.' ], 
                                        [ 'id' => 2,
                                           'texto' => 'Emendaremos todos os feriados do dia 26 até o dia 5'],
                                        [ 'id' => 3,
                                          'texto' => 'Nosso recesso de final de ano será de 23/12/2021 até 09/01/2022 ']]]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'clientes'], function (){

    Route::get('/listar', [App\Http\Controllers\ClientesController::class, 'listar'])->middleware('auth');
    Route::resource('/clientes', App\Http\Controller\ClientesController::class);
}); 

Route::group(['prefix' => 'funcionarios'], function (){

    Route::get('/listar', [App\Http\Controllers\FuncionariosController::class, 'listar'])->middleware('auth');
}); 

Route::group(['middleware' => ['auth']], function(){
	Route::resource('/clientes',App\Http\Controllers\ClientesController::class);
});


Route::group(['middleware' => ['auth']], function(){
    Route::resource('/users', App\Http\Controllers\UserController::class);
    Route::resource('/roles', App\Http\Controllers\RoleController::class);
});