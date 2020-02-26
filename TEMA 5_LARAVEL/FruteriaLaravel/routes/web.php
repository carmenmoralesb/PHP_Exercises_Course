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

Route::get('/', function () {
    return view('principal');
});

Route::get('/lista-frutas','frutasController@index');
Route::get('/insertar-fruta','frutasController@insertar');
Route::post('/guardar-fruta','frutasController@guardar');
Route::get('/borrar-fruta/{id}','frutasController@borrar');
Route::get('/edicion-fruta/{id}','frutasController@edicion');
Route::post('/editar-fruta/{id}','frutasController@editar');