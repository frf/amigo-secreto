<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', 'HomeController@showWelcome');
Route::get('/perfil/{id}', 'HomeController@showPerfil');
Route::get('/cadastrarpresente/{id}', 'HomeController@showCadastroPresente');
Route::get('/cadastrarmensagem/{id}', 'HomeController@showCadastroMensagem');
Route::get('/sorteio/{id}', 'HomeController@showSorteio');
Route::get('/excluirpresente/{id}', 'HomeController@showExcluirPresente');
Route::post('/salvarpresente', 'HomeController@showSalvarPresente');
Route::post('/salvarmensagem', 'HomeController@showSalvarMensagem');
Route::post('/sortear', 'HomeController@showSortear');