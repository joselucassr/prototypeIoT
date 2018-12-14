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

Route::get('/', 'Auth\LoginController@showResponsavelLoginForm');
Route::post('/login-responsavel', 'Auth\LoginController@responsavelLogin');

Route::get('/login-empresa', 'Auth\LoginController@showLoginForm');

Route::get('/sensores/{id}', 'SensoresController@index');
Route::post('/sensores', 'SensoresController@store');
Route::get('/sensores/{id}/lista', 'SensoresController@sensoreslista');
Route::get('/sensores/{id}/create', 'SensoresController@create');
Route::get('/sensor/{id}/edit', 'SensoresController@edit');
Route::get('/sensor/{sensor}', 'SensoresController@show');
Route::put('/sensor/{id}', 'SensoresController@update');
Route::put('/sensor/{id}/obs', 'SensoresController@updateSensor');
Route::delete('/sensor/{id}', 'SensoresController@destroy');
Route::get('/cadastro', 'PagesController@cadastro');
Route::get('/editargrupo', 'PagesController@editarGrupo');
Route::get('/adicionargrupo', 'PagesController@adicionarGrupo');
Route::get('/configurarsensor', 'PagesController@configurarSensor');
Route::get('/adicionarsensor', 'PagesController@adicionarSensor');
Route::get('/editarcadastro', 'PagesController@editarCadastro');
Route::get('/gruposlista', 'GruposController@gruposlista');

Route::resource('grupos', 'GruposController');


Route::get('/pesquisa', 'PagesController@pesquisa');
Route::post('/pesquisar', 'PagesController@pesquisar');

Route::get('/register', 'RegisterController@store');
Route::get('/cadastro/edit', 'PagesController@edit');
Route::put('/register', 'PagesController@update');

// Rotas Responsável

Route::resource('responsavel', 'ResponsavelController');

Route::get('/teste', 'Responsavel\GruposResponsavelController@teste');
Route::get('/teste2', 'Responsavel\GruposResponsavelController@teste2');

// Rotas Autenticação
Auth::routes();
