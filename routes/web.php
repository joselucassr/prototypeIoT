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

Route::get('/', 'PagesController@index');

Route::get('/painelgeral', 'PagesController@painelgeral');
Route::get('/sensores', 'PagesController@sensores');
Route::get('/sensor', 'PagesController@sensor');
Route::get('/cadastro', 'PagesController@cadastro');
Route::get('/editargrupo', 'PagesController@editarGrupo');
Route::get('/adicionargrupo', 'PagesController@adicionarGrupo');
Route::get('/configurarsensor', 'PagesController@configurarSensor');
Route::get('/adicionarsensor', 'PagesController@adicionarSensor');
Route::get('/editarcadastro', 'PagesController@editarCadastro');

Route::resource('grupos', 'GruposController');
Route::resource('sensores', 'SensoresController');

Auth::routes();
