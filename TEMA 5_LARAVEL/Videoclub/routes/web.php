<?php
/*
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth'], function() 
{
    /* rutas con nombre de edicion mostrar etc protegidas por el middleware */
    Route::get('/catalog', 'CatalogController@getIndex');
    Route::get('/catalog/show/{id}', 'CatalogController@getShow')->name('showmovie');
    Route::get('/catalog/create', 'CatalogController@getCreate')->name('createmovie');
    Route::get('/catalog/edit/{id}', 'CatalogController@getEdit')->name('editmovie');
    Route::post('/catalog/create', 'CatalogController@postCreate')->name('createmovie2');
    Route::put('/catalog/edit/{id}', 'CatalogController@putEdit')->name('editmovieput');
});

Route::get('/home', 'HomeController@index')->name('home');