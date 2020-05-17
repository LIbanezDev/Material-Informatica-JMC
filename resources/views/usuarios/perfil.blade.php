@extends('layouts.app')
@section('titulo')
Perfil {{ auth()->user()->name }}
@endsection
@section('content')
<div class="row mb-3">
    <div class="col-lg-4">
        <div class="card mb-3 justify-content-center">
            <div class="card-header py-3">
                <h6 class="text-primary font-weight-bold m-0 text-center">
                    {{ strtoupper(auth()->user()->name) }}
                </h6>
            </div>
            <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4 img-profile border border-secondary" src="{{ asset('imgsPerfil/'.auth()->user()->imagen) }}" width="160" height="160">
                <div class="mb-3"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">Cambiar Imagen</div>            
            </div>
            @if(session('mensaje_img'))
                    <div class="alert alert-danger alert-dismissible fade show  m-4" role="alert">
                    <strong> {{ session('mensaje_img') }} </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>   
                @endif
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="text-primary font-weight-bold m-0">Mis Contribuciones</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Certamenes<span class="float-right">{{ $usuario_info->certamenes }}</span></h4>
                <div class="progress progress-sm mb-3">
                    <div class="progress-bar bg-danger" id = "certamenes" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"><span class="sr-only">23%</span></div>
                </div>
                <h4 class="small font-weight-bold">Laboratorios<span class="float-right">{{ $usuario_info->laboratorios }}</span></h4>
                <div class="progress progress-sm mb-3">
                    <div class="progress-bar bg-warning" id = "laboratorios" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"><span class="sr-only">0%</span></div>
                </div>
                <h4 class="small font-weight-bold">Controles / Tareas <span class="float-right">{{ $usuario_info->controles }}</span></h4>
                <div class="progress progress-sm mb-3">
                    <div class="progress-bar bg-primary" id = "controles" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"><span class="sr-only">0%</span></div>
                </div>
                <h4 class="small font-weight-bold">Otro<span class="float-right">{{ $usuario_info->otros }}</span></h4>
                <div class="progress progress-sm mb-3">
                    <div class="progress-bar bg-info" id = "otros" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"><span class="sr-only">0%</span></div>
                </div>                         
            </div>
        </div>
    </div>
    <div class="col-lg-8">                                               
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header py-3 justify-content-center">
                        <p class="text-primary m-0 font-weight-bold">Mis Favoritos</p>
                    </div>
                    <div class="card-body">
                        <div class="row"> 
                            @if($asignaturas_favoritas_detalles)
                            @foreach($asignaturas_favoritas_detalles as $asignaturas_fav)                                    
                            <div class="col-md col-xl-6 mb-2">
                                <div class="card shadow border-left-success">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col mr-2">
                                                <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span></span></div>
                                                <div class="text-dark font-weight-bold h5 mb-0">
                                                <a href="{{ route('asignaturas.show', $asignaturas_fav->id )}}">
                                                    <span> 
                                                        {{ $asignaturas_fav->nombre }}       
                                                    </span>
                                                </a>
                                                </div>            
                                            </div>
                                            <div class="col-auto"><a class="btn btn-danger btn-circle ml-1" role="button" href="{{ route('deleteFavorito', ['id_asignatura' => $asignaturas_fav->id, 'id_user' => auth()->user()->id ]) }}"><i class="fas fa-trash text-white"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <h2 class="display text-center"> Agrega favoritos a tu lista de asignaturas!</h2>
                            @endif
                        </div> 
                        @if(session('message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong> {{ session('message')}} </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
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
                            <h5 class="modal-title" id="staticBackdropLabel">Subir nueva imagen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{ route('cambiarDatos') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">                                
                            <div class="form-row">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4 border border-secondary" src="{{ asset('imgsPerfil/'.auth()->user()->imagen) }}" width="160" height="160">
                                    <div class="mb-3"><h2 class="text-center">Cambiar datos </h2></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Nombre</label>
                                <input type="text" class="form-control" id="exampleFormControlFile1" name="nombre" value= "{{auth()->user()->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Ingrese archivo a subir</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagen">
                                <div class="text-muted">
                                <h6>.jpg - .png</h6>
                                </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Cambiar Imagen</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>



                <script>
                    function defBarra(cantidad){
                        switch(cantidad){
                            case 1:
                                return "10%";
                            case 2:
                                return "20%";
                            case 3:
                                return "30%";
                            case 4:
                                return "40%";
                            case 5:
                                return "50%";
                            case 6:
                                return "60%";
                            case 7:
                                return "70%";
                            case 8:
                                return "80%";
                            case 9:
                                return "90%";
                            case 10:
                                return "100%";
                            default:
                                break;    
                        }
                    }
                    var certamenes, labs, controles, otros;
                    certamenes = parseInt('<?php echo $usuario_info->certamenes ?>', 10);
                    labs= parseInt('<?php echo $usuario_info->laboratorios ?>', 10);
                    controles=parseInt('<?php echo $usuario_info->controles ?>', 10);
                    otros=parseInt('<?php echo $usuario_info->otros ?>', 10);

                    var certamenes_doc, labs_doc, controles_doc, otros_doc;
                    certamenes_doc = document.getElementById('certamenes');
                    labs_doc = document.getElementById('laboratorios');
                    controles_doc = document.getElementById('controles');
                    otros_doc = document.getElementById('otros');

                    certamenes_doc.style.width = defBarra(certamenes);
                    labs_doc.style.width = defBarra(labs);
                    controles_doc.style.width = defBarra(controles);
                    otros_doc.style.width = defBarra(otros);
                </script>         
@endsection