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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/user/activation/{token}', 'Auth\RegisterController@activationCode');
Route::get('/evento/{evento?}', 'EventoController@index');
Route::get('/evento/listar', 'EventoController@listar');
Route::get('/evento/show/{evento?}', 'EventoController@show');
Route::get('/evento/searchRif/{tipo_rif?}/{rif?}', 'EventoController@searchRif');
