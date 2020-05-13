<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo')</title>
    <link rel="shortcut icon" href="{{ asset('Logo_UTFSM.png') }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .dropdown-submenu{
            position: relative;
        }
        .dropdown-submenu a::after{
            transform: rotate(-90deg);
            position: absolute;
            right: 3px;
            top: 40%;
        }
        .dropdown-submenu:hover .dropdown-menu, .dropdown-submenu:focus .dropdown-menu{
            display: flex;
            flex-direction: column;
            position: absolute !important;
            margin-top: -30px;
            left: 100%;
        }
        @media (max-width: 992px) {
            .dropdown-menu{
                width: 50%;
            }
            .dropdown-menu .dropdown-submenu{
                width: auto;
            }
        }
        .mouseOverSecciones:hover{
            background: #B2FF90;
            color:black;
        }
        .mouseOverAsignaturas:hover{
            background: #A8C2FF;
            color: black;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('Logo_UTFSM.png') }}" width="30" height="30" alt="">
                    Universidad Técnica Federico Santa Maria
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('productos.index')}}">Revisa tu inventario</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Asignaturas
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle mouseOverSecciones" data-toggle="dropdown" href="#">
                                        Ciencias
                                    </a>
                                    <ul class="dropdown-menu">
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 1)}}">Elementos de la Matemática</a>
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 7)}}">Matemática Aplicada</a>
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 3)}}">Educación Física</a>
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 20)}}">Humanidades</a> 
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 2)}}">Inglés I</a>
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 8)}}">Inglés II</a>
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 14)}}">Inglés III</a>    
                                    </ul>                 
                                </li>                                                              
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle mouseOverSecciones" data-toggle="dropdown" href="#">
                                        Análisis y Diseño
                                    </a>
                                    <ul class="dropdown-menu">
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 4)}}">Análisis de Sistemas de Información</a>
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 10)}}">Diseño de Sistemas de Información</a>
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 9)}}">Análisis y Diseño Orientado a Objeto</a>
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 16)}}">Diseño y Programación Orientada a la Web</a>                                        
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle mouseOverSecciones" data-toggle="dropdown" href="#">
                                        Programación
                                    </a>
                                    <ul class="dropdown-menu">
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 5)}}">Programación</a>
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 11)}}">Estructuras de Datos</a>
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 12)}}">Programación Orientada a Evento</a>
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 15)}}">Programación Orientada a Objeto</a>
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 17)}}">Bases de Datos</a>
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 22)}}">Taller de desarrollo de Software</a>
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 21)}}">Desarrollo de Aplicaciones Móviles</a>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle mouseOverSecciones" data-toggle="dropdown" href="#">
                                        Arquitectura de Computadores
                                    </a>
                                    <ul class="dropdown-menu">
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 4)}}">Introducción a la Informática y Computación</a>
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 18)}}">Arquitectura y organización de Computadores</a>
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 23)}}">Sistemas Operativos</a>    
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle mouseOverSecciones" data-toggle="dropdown" href="#">
                                        Talleres Sistemas de Info
                                    </a>
                                    <ul class="dropdown-menu">
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 13)}}">Taller de Sistemas de Información I</a>
                                        <a class="dropdown-item mouseOverAsignaturas" href="{{ route('asignaturas.show', 19)}}">Taller de Sistemas de Información II</a>               
                                    </ul>
                                </li>
                                <a class="dropdown-item mouseOverSecciones" href="{{ route('asignaturas.index') }}">Ver Todas</a>
                            </ul>
                        </li>
                    </ul>                   
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"> Ingresar </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"> Registrarse </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item mouseOverAsignaturas" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div> 
</body>
</html>
