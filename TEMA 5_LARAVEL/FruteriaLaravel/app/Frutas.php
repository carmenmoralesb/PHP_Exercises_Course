<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use App\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Fruta;

class FrutaController extends Controller 
{
    public function Index() {
        $frutas = DB::table('frutas')
        ->orderBy('id','desc')
        ->get();

        return view('frutas.index',compact('frutas'));
    }

    public function Insertar() {
        $fruta=new Fruta();
        $fruta->nombre=$requets->input('nombre');
        $fruta->save();
    }

    public function Editar() {
        $fruta=Fruta::find($id);
        $fruta->nombre=$request->input('nombre');
        $fruta->save();
    }

    public function Borrar() {
        $fruta = Fruta::find($id);
        $fruta->delete();
        $affectedRows = Fruta::where('id','=',$id)->delete();
    }

}










?>