@extends('layouts.master')

@section('content')

<div class="row">
    @foreach ( $movies as $movie )                  
        <div class="col-xs-6 col-sm-4 col-md-3 text-center mt-4">
            <a href="{{ url('/catalog/show/' . $movie->id ) }}" style="color:black">
                <img class="img-fluid" src="{{$movie->poster}}" width="100%" style="height:400px"/>
                <h4 style="min-height:45px;margin:5px 0 10px 0">
                    {{$movie->title}}
                </h4>
            </a>
        </div>
    @endforeach

</div>

@stop
