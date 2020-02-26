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

<form method="POST" action="{{url('/guardar-fruta')}}">
{{csrf_field()}}
<label for="nombre">Nombre</label>
<input for="nombre" type="text" name="nombre">
<label for="descripcion">Descripcion</label>
<input for="descripcion" type="text" name="descripcion">
<label for="precio">Precio</label>
<input for="precio" type="number" name="precio">
<button type="submit">Guardar fruta</button>
</form>
@stop
</html>