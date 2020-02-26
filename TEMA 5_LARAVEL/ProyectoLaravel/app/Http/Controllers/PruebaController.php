<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    //

    public function index() {
        $nombre = 'Carmen';
        $edad=24;
        return view('prueba.home',['nombre'=>$nombre,'edad'=>$edad]);
    }

    public function formulario() {
        return view('prueba.formulario');
    }

    public function recibir(Request $request) {
        $nombre = $request -> input('nombre');
        $apellidos = $request -> input('apellidos');

        return "$nombre $apellidos";
    }
}
