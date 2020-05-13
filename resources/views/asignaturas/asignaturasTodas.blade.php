@extends('layouts.app')
@section('titulo')
Asignaturas T.U en Informática
@endsection
@section('content')
<div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <h5 class="text-dark mb-0">Primer Semestre</h5><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-file-upload fa-sm text-white-50"></i>&nbsp;Subir Material</a></div>   
                <div class="row">
                    @foreach($semestre_asignatura[1] as $asignatura)
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span></span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>{{ $asignatura->nombre }} ({{ $cantidad_archivos[$asignatura->id] }}) </span></div>
                                        
                                    </div>
                                    <div class="col-auto"><a href="{{ route('asignaturas.show', $asignatura->id )}}"><i class="fas fa-arrow-right fa-2x text-gray-500"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> 
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <h5 class="text-dark mb-0">Segundo Semestre</h5></div>
                <div class="row">                    
                    @foreach($semestre_asignatura[2] as $asignatura)
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span></span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>{{ $asignatura->nombre }} ({{ $cantidad_archivos[$asignatura->id] }}) </span></div>
                                        
                                    </div>
                                    <div class="col-auto"><a href="{{ route('asignaturas.show', $asignatura->id )}}"><i class="fas fa-arrow-right fa-2x text-gray-500"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    @endforeach
                </div>
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <h5 class="text-dark mb-0">Tercer Semestre</h5></div> 
                <div class="row">
                    @foreach($semestre_asignatura[3] as $asignatura)
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-danger py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span></span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>{{ $asignatura->nombre }} ({{ $cantidad_archivos[$asignatura->id] }})</span></div>
                                        
                                    </div>
                                    <div class="col-auto"><a href="{{ route('asignaturas.show', $asignatura->id )}}"><i class="fas fa-arrow-right fa-2x text-gray-500"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    @endforeach 
                </div>
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <h5 class="text-dark mb-0">Cuarto Semestre</h5></div>
                <div class="row">
                    @foreach($semestre_asignatura[4] as $asignatura)
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-warning py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span></span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>{{ $asignatura->nombre }} ({{ $cantidad_archivos[$asignatura->id] }})</span></div>
                                        
                                    </div>
                                    <div class="col-auto"><a href="{{ route('asignaturas.show', $asignatura->id )}}"><i class="fas fa-arrow-right fa-2x text-gray-500"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    @endforeach 
            </div>                 
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="text-primary font-weight-bold m-0">Tipo de material subido</h6>
                            </div>
                            <div class="card-body">
                                <h4 class="small font-weight-bold">Certamenes<span class="float-right">20%</span></h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"><span class="sr-only">20%</span></div>
                                </div>
                                <h4 class="small font-weight-bold">Laboratorios<span class="float-right">40%</span></h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"><span class="sr-only">40%</span></div>
                                </div>
                                <h4 class="small font-weight-bold">Controles<span class="float-right">60%</span></h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="sr-only">60%</span></div>
                                </div>
                                <h4 class="small font-weight-bold">Otro<span class="float-right">80%</span></h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="sr-only">80%</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="card text-white bg-primary shadow">
                                    <div class="card-body">
                                        <p class="m-0">Primary</p>
                                        <p class="text-white-50 small m-0">#4e73df</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card text-white bg-success shadow">
                                    <div class="card-body">
                                        <p class="m-0">Success</p>
                                        <p class="text-white-50 small m-0">#1cc88a</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card text-white bg-info shadow">
                                    <div class="card-body">
                                        <p class="m-0">Info</p>
                                        <p class="text-white-50 small m-0">#36b9cc</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card text-white bg-warning shadow">
                                    <div class="card-body">
                                        <p class="m-0">Warning</p>
                                        <p class="text-white-50 small m-0">#f6c23e</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card text-white bg-danger shadow">
                                    <div class="card-body">
                                        <p class="m-0">Danger</p>
                                        <p class="text-white-50 small m-0">#e74a3b</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card text-white bg-secondary shadow">
                                    <div class="card-body">
                                        <p class="m-0">Secondary</p>
                                        <p class="text-white-50 small m-0">#858796</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
@endsection

