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