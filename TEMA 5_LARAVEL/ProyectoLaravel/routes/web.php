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
    return "ola mundo";
});

Route::get('/usuario/{nombre}',function($nombre) {
        return 'Pepe: ' .$nombre;
});

Route::get('/usuario/{nombre?nombre=admin}',function($nombre) {
    return 'Nombre: ' .$nombre;
});

Route::get('usuario3/{nombre}/{edad}',function($nombre,$edad) 
{   return view('prueba/nombre',['nombre'=>$nombre,'edad'=>$edad]);})
    ->where(array('nombre'=> '[A-Za-z]+','edad'=>'[0-9]+'));

Route::get('usuario5/{nombre?}/{edad?}',function($nombre="Ninguno",$edad=18) {
    return view('prueba.edad') ->with('nombre',$nombre)
                                                                  -> with('edad',$edad);
}
);

Route::get('/home','PruebaController@index'); 

Route::get('formulario','PruebaController@formulario');
Route::post('recibir','PruebaController@recibir');