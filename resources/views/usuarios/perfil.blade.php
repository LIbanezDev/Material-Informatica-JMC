@extends('layouts.app')
@section('titulo')
Perfil {{ auth()->user()->name }}
@endsection
@section('content')
                <div class="row mb-3">
                    <div class="col-lg-4">
                        <div class="card mb-3">
                            <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="{{ asset('imgsPerfil/'.auth()->user()->imagen) }}" width="160" height="160">
                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Cambiar Imagen</button></div>
                            </div>
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="text-primary font-weight-bold m-0">Mis Contribuciones</h6>
                            </div>
                            <div class="card-body">
                                <h4 class="small font-weight-bold">Certamenes<span class="float-right">0%</span></h4>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-danger" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"><span class="sr-only">20%</span></div>
                                </div>
                                <h4 class="small font-weight-bold">Laboratorios<span class="float-right">0%</span></h4>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-warning" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"><span class="sr-only">0%</span></div>
                                </div>
                                <h4 class="small font-weight-bold">Controles / Tareas <span class="float-right">0%</span></h4>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-primary" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"><span class="sr-only">0%</span></div>
                                </div>
                                <h4 class="small font-weight-bold">Otro<span class="float-right">0%</span></h4>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-info" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"><span class="sr-only">0%</span></div>
                                </div>                         
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">                                               
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Tus datos</p>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="username"><strong>Nombre</strong></label><input class="form-control" type="text" value="{{ auth()->user()->name }}" name="username"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label for="email"><strong>Correo Electrónico</strong></label><input class="form-control" type="email" value="{{ auth()->user()->email }}" name="email"></div>
                                                </div>
                                            </div>                                           
                                            <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Cambiar Nombre</button></div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card shadow">
                                    <div class="card-header py-3 justify-content-center">
                                        <p class="text-primary m-0 font-weight-bold">Mis Asignaturas</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row"> 
                                            @for($i = 0; $i < 6; $i++)                                    
                                            <div class="col-md col-xl-6 mb-1">
                                                <div class="card shadow border-left-success">
                                                    <div class="card-body">
                                                        <div class="row align-items-center no-gutters">
                                                            <div class="col mr-2">
                                                                <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span></span></div>
                                                                <div class="text-dark font-weight-bold h5 mb-0"><span> text de prueba sdasdasdasdasdasda </span></div>
                                                                
                                                            </div>
                                                            <div class="col-auto"><a class="btn btn-danger btn-circle ml-1" role="button"><i class="fas fa-trash text-white"></i></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endfor
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
@endsection