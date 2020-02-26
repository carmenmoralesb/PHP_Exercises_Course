@extends('master')
@section('titulo')
@section('header')
@parent

@stop
@section('content')

@if(session('status'))
<p>{{session('status')}}</p>
@endif
@foreach ($frutas as $fruta) 
<ul>
<li>Fruta {{ $fruta->id }}, Precio: {{ $fruta->precio}}, Descripción: {{ $fruta->descripcion }}, Fecha: {{ $fruta->fecha }}  <a href="{{url('/edicion-fruta/'.$fruta->id)}}">Editar</a> <a href="{{url('/borrar-fruta/'.$fruta->id)}}">Borrar</a></li>
</ul>
@endforeach
@stop