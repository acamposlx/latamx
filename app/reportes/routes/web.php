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

Route::get('/', [
'uses' => 'LoginController@index',
'as' => 'login.index'
]);
Route::get('/uso', [
'uses' => 'ConsignatarioController@consignatario_uso',
'as' => 'consignatarios.uso'
]);

Route::get('/reporteconsignatario', [
'uses' => 'ConsignatarioController@index',
'as' => 'consignatarios.index'
]);

Route::post('/reporteconsignatario', [
'uses' => 'ConsignatarioController@filtrado',
'as' => 'consignatarios.filtro'
]);



Route::post('/postLogin', [
'uses' => 'LoginController@postLogin',
'as' => 'login.postlogin'
]);

Route::get('/register', [
'uses' => 'RegistrationController@register',
'as' => 'registration.register'
]);

Route::post('/register', [
'uses' => 'RegistrationController@registerPost',
'as' => 'registration.post'
]);