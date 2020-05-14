@extends('layouts.app')
@section('titulo')
Asignaturas T.U en Informática
@endsection
@section('content')
<div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mt-2 mb-2">
                <h5 class="text-dark mb-0">Primer Semestre</h5>
                <a class="btn btn-success btn-sm d-sm-inline-block text-body" role="button" data-toggle="modal" data-target="#staticBackdrop">
                    <i class="fas fa-file-upload fa-sm text-white"></i>
                    &nbsp;Subir Material
                </a>
                </div>   
                <div class="row">
                    @foreach($semestre_asignatura[1] as $asignatura)
                    <div class="col-md-6 col-xl-3 mb-2">
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
                <div class="d-sm-flex justify-content-between align-items-center mt-2 mb-2">
                <h5 class="text-dark mb-0">Segundo Semestre</h5></div>
                <div class="row">                    
                    @foreach($semestre_asignatura[2] as $asignatura)
                    <div class="col-md-6 col-xl-3 mb-2">
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
                <div class="d-sm-flex justify-content-between align-items-center mt-2 mb-2">
                <h5 class="text-dark mb-0">Tercer Semestre</h5></div> 
                <div class="row">
                    @foreach($semestre_asignatura[3] as $asignatura)
                    <div class="col-md-6 col-xl-3 mb-2">
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
                <div class="d-sm-flex justify-content-between align-items-center mt-2 mb-2">
                <h5 class="text-dark mb-0">Cuarto Semestre</h5></div>
                <div class="row">
                    @foreach($semestre_asignatura[4] as $asignatura)
                    <div class="col-md-6 col-xl-3 mb-2">
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
                    <div class="col-lg-6 mb-2">
                        <div class="card shadow mb-2">
                            <div class="card-header py-3">
                                <h6 class="text-primary font-weight-bold m-0">Tipo de material subido</h6>
                            </div>
                            <div class="card-body">
                                <h4 class="small font-weight-bold">Certamenes<span class="float-right" id="cert_porcentaje"></span></h4>
                                <div class="progress mb-2">
                                    <div class="progress-bar bg-danger" id = "cert" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"><span class="sr-only"></span></div>
                                </div>
                                <h4 class="small font-weight-bold">Laboratorios<span class="float-right" id="lab_porcentaje"></span></h4>
                                <div class="progress mb-2">
                                    <div class="progress-bar bg-warning" id = "lab" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"><span class="sr-only"></span></div>
                                </div>
                                <h4 class="small font-weight-bold">Controles<span class="float-right" id="ctrl_porcentaje"></span></h4>
                                <div class="progress mb-2">
                                    <div class="progress-bar bg-primary" id = "ctrl" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="sr-only"></span></div>
                                </div>
                                <h4 class="small font-weight-bold">Otro<span class="float-right" id="otr_porcentaje"></span></h4>
                                <div class="progress mb-2">
                                    <div class="progress-bar bg-info" id = "otr" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="sr-only"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <div class="card text-white bg-primary shadow">
                                    <div class="card-body">
                                        <p class="m-0">Primary</p>
                                        <p class="text-white-50 small m-0">#4e73df</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="card text-white bg-success shadow">
                                    <div class="card-body">
                                        <p class="m-0">Success</p>
                                        <p class="text-white-50 small m-0">#1cc88a</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="card text-white bg-info shadow">
                                    <div class="card-body">
                                        <p class="m-0">Info</p>
                                        <p class="text-white-50 small m-0">#36b9cc</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="card text-white bg-warning shadow">
                                    <div class="card-body">
                                        <p class="m-0">Warning</p>
                                        <p class="text-white-50 small m-0">#f6c23e</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="card text-white bg-danger shadow">
                                    <div class="card-body">
                                        <p class="m-0">Danger</p>
                                        <p class="text-white-50 small m-0">#e74a3b</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
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
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Subir material</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{ route('archivos.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">       
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Nombre de la asignatura</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="nombre_asignatura">
                                @foreach($todas_las_asignaturas as $asignatura )
                                <option>{{ $asignatura->nombre }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Semestre en que se imparte</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="semestre_asignatura">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Tipo de material</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="tipo_material">
                                    <option>Certamen</option>
                                    <option>Laboratorio</option>
                                    <option>Control</option>
                                    <option>Apunte / Otro</option>
                                </select>
                                </div>
                                <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Numero de evaluación</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="numero_material">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>0</option>
                                </select>
                                <div class="text-muted">
                                    <h6 class="mt-1">0 si es Apunte/Otro </h6>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Ingrese archivo a subir</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="archivo">
                                <div class="text-muted">
                                <h6>Formato imagen(.jpg - .png) documento (.pdf - .docx - etc)</h6>
                                </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Subir Archivo</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
</div> 
<script>
    var certamenes, labs, controles, otros;
    certamenes = parseInt('<?php echo $cantidad_material['certamenes'] ?>', 10);
    labs= parseInt('<?php echo $cantidad_material['laboratorios'] ?>', 10);
    controles=parseInt('<?php echo $cantidad_material['controles'] ?>', 10);
    otros=parseInt('<?php echo $cantidad_material['otros'] ?>', 10);
    
    var sumaTotal = certamenes + labs + controles + otros;
    certamenes = Math.round((certamenes / sumaTotal) * 100);
    labs = Math.round((labs / sumaTotal) * 100);
    controles = Math.round((controles / sumaTotal) * 100);
    otros = Math.round((otros / sumaTotal) * 100);

    document.getElementById('cert').style.width = certamenes+'%';
    document.getElementById('lab').style.width = labs+'%';
    document.getElementById('ctrl').style.width = controles+'%';
    document.getElementById('otr').style.width = otros+'%';

    document.getElementById('cert_porcentaje').innerHTML = certamenes+'%';
    document.getElementById('lab_porcentaje').innerHTML = labs+'%';
    document.getElementById('ctrl_porcentaje').innerHTML = controles+'%';
    document.getElementById('otr_porcentaje').innerHTML = otros+'%';
</script>  
@endsection

