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
/*
Route::post('/login-responsavel', 'Auth\LoginController@responsavelLogin');
*/

Route::get('/login-empresa', 'Auth\LoginController@showLoginForm');

// Mostra página principal, Armazena, Mostra Lista, Cria, Mostra a Página de edição, Edita, Edita o OBS, e deleta os sensores
Route::get('/sensores/{id}', 'SensoresController@index');
Route::post('/sensores', 'SensoresController@store');
Route::get('/sensores/{id}/lista', 'SensoresController@sensoreslista');
Route::get('/sensores/{id}/create', 'SensoresController@create');
Route::get('/sensor/{id}/edit', 'SensoresController@edit');
Route::get('/sensor/{sensor}', 'SensoresController@show');
Route::put('/sensor/{id}', 'SensoresController@update');
Route::put('/sensor/{id}/obs', 'SensoresController@updateSensor');
Route::delete('/sensor/{id}', 'SensoresController@destroy');
// -------------------------------------------------------------------------

// Mostra a página de cadastro
Route::get('/cadastro', 'PagesController@cadastro')->middleware('auth:admin');

// Mostra os grupos em lista
Route::get('/gruposlista', 'GruposController@gruposlista');

// Cria as rotas para os Grupos
Route::resource('grupos', 'GruposController');

// Rotas para a pesquisa
Route::get('/pesquisa', 'PesquisaController@pesquisa');
Route::post('/pesquisar', 'PesquisaController@pesquisar');

// Rotas para o mostrar as páginas de editar e o editar do registro da empresa
Route::get('/cadastro/edit', 'PagesController@edit');
Route::put('/register', 'PagesController@update')->middleware('auth:admin');

// Rotas Responsável
Route::resource('responsavel', 'ResponsavelController');

// Rotas Admin
    // Login

    Route::get('/login-admin', 'Auth\LoginController@loginPage');
    Route::post('/login-admin', 'Auth\LoginController@adminLogin');
    // Index
    Route::get('/admin', 'AdminController@index');


// Rotas Autenticação
Auth::routes();
