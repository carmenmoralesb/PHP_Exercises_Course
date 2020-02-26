@extends('layouts.master')

@section('content')    

    <div class="row mt-3">
        <div class="col-5">
            <img class="img-fluid" width="100%" src="{{$pelicula->poster}}" style="height:80%"/>
        </div>
        <div class="col-6 ml-4">
            <h2 style="min-height:45px;margin:5px 0 10px 0">
                {{$pelicula->title}}
            </h2>
            <p style="min-height:45px;margin:5px 0 10px 0">
                <strong>Año: </strong>
                {{$pelicula->year}}
            </p>
            <p style="min-height:45px;margin:5px 0 10px 0">
                <strong>Director: </strong>
                {{$pelicula->director}}
            </p>
            <p style="min-height:45px;margin:5px 0 10px 0">
                <strong>Resumen: </strong>
                {{$pelicula->synopsis}}
            </p>
            <p style="min-height:45px;margin:5px 0 10px 0">
                    <strong>Estado: </strong>
                    @if( $pelicula->rented == TRUE )
                    <span style="color:red">Película alquilada<br></span>
                    <button type="button" class="btn btn-danger">Devolver película</button>

                    @else
                        <span style="color:green">Película disponible</span><br>
                        <button type="button" class="btn btn-primary">Alquilar película</button>
                    @endif

                    <a class="btn btn-warning" href="{{ url('/catalog/edit/' . $pelicula->id ) }}">
                        <i class="fa fa-pie-chart"></i>
                        Editar
                    </a>

                    <a class="btn btn-secondary" href="{{ url('/catalog') }}">
                        <i class="fa fa-pie-chart"></i>
                        Volver
                    </a>
                </p>
        </div>
    </div>

@stop
