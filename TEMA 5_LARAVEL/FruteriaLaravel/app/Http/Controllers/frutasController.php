<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class frutasController extends Controller 
{
    public function index() {
        $frutas = DB::table('frutas')
        ->orderBy('id','desc')
        ->get();

        return view('frutas.index',compact('frutas'));
    }

    public function insertar() {
        return view('frutas.insertar');
    }

    public function guardar(Request $request) {
        $fruta = DB::table('frutas')->insert(array(
            'nombre'=>$request->input('nombre'),
            'descripcion'=>$request->input('descripcion'),
            'precio'=>$request->input('precio'),
            'fecha'=>date('Y-m-d')
        ));
        return redirect() -> action('frutasController@index');
    }

    public function edicion($id) {
        $fruta=DB::table('frutas')
        ->where('id',$id)->first();
        return view('frutas.edicion',['fruta'=>$fruta]);
    }

    public function editar(Request $request,$id) {
        $frutas=DB::table('frutas')
        ->where('id',$id)
        ->update([
            'nombre'=>$request->input('nombre'),
            'descripcion'=>$request->input('descripcion'),
            'precio'=>$request->input('precio'),
            'fecha'=>$request->input('fecha'),
        ]);
        return redirect() -> action('frutasController@index')->with('status','Fruta editada correctamente');
    }

    public function borrar($id) {
        $fruta = DB::table('frutas')->where('id',$id)->delete();
        return redirect()->action('frutasController@index')->with('status','Fruta borrada');
    }

}










?>

?>