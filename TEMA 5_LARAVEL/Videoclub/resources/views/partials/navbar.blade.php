<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/catalog') }}" style="color:white"><span style="font-size:15pt"><img src="https://cdn130.picsart.com/299574523023211.png" style="width:50px; margin-right:30px"></span>Videoclub Alberti</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if( Auth::check() )
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('catalog') && ! Request::is('catalog/create')? 'active' : ''}}">
                        <a class="nav-link" style="color:white" href="{{url('/catalog')}}">
                            <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            Catálogo
                        </a>
                    </li>
                    <li class="nav-item {{  Request::is('catalog/create') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/catalog/create')}}" style="color:white">
                            <span>&#10010</span> Añadir película
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right" style="list-style: none">
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST" style="display:inline" style="color:white">
                            {{ csrf_field() }}
                            <button  style="color:white" type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
                    @else
                    <ul class="navbar-nav navbar-right" style="list-style: none">
                    <li class="nav-item">
                        <a href="{{ url('/login')}}"><button  style="color:white" type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                            Iniciar sesión
                        </button></a>
                    </li>
                        <li class="nav-item">
                        <a href="{{ url('/register')}}"><button  style="color:white" type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                           Registro
                        </button></a>
                    </li>
                    </a>       
                    </li>
                </ul>
            </div>

        @endif
    </div>            </div>

    </div>
</nav>
