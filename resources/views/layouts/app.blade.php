<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo')</title>
    <link rel="icon" href="{{asset('Logo_UTFSM.png')}}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{ route('asignaturas.index')}}">
                    <div class="sidebar-brand-icon"><img src="{{ asset('Logo_UTFSM.png') }}" alt="Logo USM" height="40" width="40" ></div>
                    <div class="sidebar-brand-text mx-3"><span>Material USM</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('asignaturas.index') }}"><i class="fas fa-book"></i><span>Asignaturas</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('perfil') }}"><i class="fas fa-user"></i><span>Mi perfil</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('ranking')}}"><i class="fas fa-table"></i><span>Ranking Usuarios</span></a></li>                   
                    @guest
                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('login') }}"><i class="far fa-user-circle"></i><span>Entrar</span></a></li>
                        @if (Route::has('register'))
                            <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-circle"></i><span>Registrarse</span></a></li>
                        @endif
                    @endguest                   
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <div class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <img src="{{ asset('assets/icons/github.svg')}}" alt="" height="30" width="30">
                            <p class="font-weight-bolder d-inline">GitHub</p>
                            <a href="https://github.com/Fromiti/Material-Informatica-JMC" target="_blank" class="text-black">
                                <i class="fas fa-location-arrow"></i>
                            </a>
                        </div>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation"></li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            @guest
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">Invitado</span><img class="border rounded-circle img-profile" src="{{ asset('imgsPerfil/default.png') }}"></a>                                   
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        <a class="dropdown-item" role="presentation" href="{{ route('login') }}">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            &nbsp;Iniciar Sesion
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @else
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">{{ auth()->user()->name }}</span><img class="border rounded-circle img-profile" src="{{ asset('imgsPerfil/'.auth()->user()->imagen) }}"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        <a class="dropdown-item" role="presentation" href="{{ route('perfil') }}">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            &nbsp;Mi Perfil
                                        </a>                                      
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Cerrar Sesión</a></div>                    
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
            </div>
            </nav>       
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
</body>
</html>