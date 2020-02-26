<head>
<title>Titulo - @yield('titulo')</title>
</head>
<body>
@section('header')
@include('layouts.header')
<h1>BIENVENIDO A LA FRUTERÍA LARAVEL</h1>
@show
<div class="container">
@yield('content')
</div>
@section('footer')
@include('layouts.footer')
@show
</body>