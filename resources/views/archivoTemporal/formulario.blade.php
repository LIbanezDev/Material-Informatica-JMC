@extends('layouts.app')
@section('titulo')
Root Only
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">               
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span> PORTAL DE ADMINISTRACION DE {{strtoupper(auth()->user()->name)}} </span>
                    <a href="{{route('asignaturas.index')}}" class="btn btn btn-warning btn-sm">Volver atras</a>
                </div>
                <div class="text-center"> 
                    <h2 class="mt-4 mb-4">Lista de archivos que los usuarios han subido.</h2>
                </div>
                @if(isset($archivos_a_comprobar))
                @foreach($archivos_a_comprobar as $a)
                <div class="card-body">     
                    <form action = "{{ route('storeArchivo') }} " method = "POST" class = "mb-2" enctype="multipart/form-data">
                    @csrf                            
                        <div class="form-row">
                            <input class="d-none" name = 'id' value="{{$a->id}}">                     
                            <div class="form-group col-md-1">
                                <input type="number" class="form-control" name = 'subido_por' value="{{$a->subido_por_usuario}}"> 
                                <div class="text-muted">
                                    <h6>ID Usuario</h6>
                                </div>
                            </div>                           
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name = 'nombre' value="{{$a->nombre}}"> 
                                <div class="text-muted">
                                    <h6>Nombre del archivo</h6>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" class="form-control" value="{{$a->formato}}" name = 'formato'>
                                <div class="text-muted">
                                    <h6>Formato</h6>
                                </div>                     
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" class="form-control" name = 'tipo_evaluacion' value = "{{$a->tipo_evaluacion}}"> 
                                <div class="text-muted">
                                    <h6>Tipo de evaluacion</h6>
                                </div>
                            </div>  
                            <div class="form-group col-md-1">
                                <input type="number" class="form-control"  name = 'semestre' value = "{{$a->semestre}}">
                                <div class="text-muted">
                                    <h6>Semestre</h6>
                                </div> 
                            </div> 
                            <div class="form-group col-md-1">
                                <input type="number" class="form-control" name = 'numero_asignatura' value = "{{$a->numero_asignatura}}"> 
                                <div class="text-muted">
                                    <h6>Ramo</h6>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <a href="{{ asset('archivosAsignaturas/'.$a->numero_asignatura.'/'.$a->nombre) }}" target="_blank"><img src="{{ asset('assets/icons/'.$a->formato.'.svg')}}" alt="" height="40" width="40"> {{ $a->nombre }} </a>
                                <a href="{{ asset('archivosAsignaturas/'.$a->numero_asignatura.'/'.$a->nombre) }}" download="{{ $a->nombre }}"> 
                                </a>
                            </div>                                 
                            <div class="form-group col-md-3">
                                <button name="voto" value="apruebo" type="submit" class="btn btn-success btn-sm">Aceptar y subir</button>    
                                <button name="voto" value="rechazo" type="submit" class="btn btn-danger btn-sm">Rechazar</button>
                            </div>
                        </div>                   
                    </form>                            
                </div>
                @endforeach
                @endif
            </div>
            @if(session('mensaje'))
                <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert">
                <strong> {{session('mensaje')}} </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>   
            @endif
        </div>
    </div>    
</div>
@endsection