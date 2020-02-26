<html>
@extends('master')
@section('titulo')
@section('header')
@parent

@stop
@section('content')

@if(session('status'))
<p>{{session('status')}}</p>
@endif

<form method="POST" action="{{url('/editar-fruta/'.$fruta->id)}}">
{{csrf_field()}}
<label for="nombre">Nombre</label>
<input for="nombre" value="{{$fruta->nombre}}" type="text" name="nombre">
<label for="descripcion" >Descripcion</label>
<input for="descripcion" value="{{$fruta->descripcion}}" type="text" name="descripcion">
<label for="precio">Precio</label>
<input for="precio" value="{{$fruta->precio}}" type="number" name="precio">
<label for="fecha">Fecha</label>
<input for="fecha" value="{{$fruta->fecha}}" type="date" name="fecha">
<button type="submit">Guardar fruta</button>
</form>
@stop
</html>