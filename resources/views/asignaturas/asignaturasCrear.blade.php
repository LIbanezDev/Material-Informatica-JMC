@extends('layouts.app')
@section('titulo')
Asignaturas T.U en Informática
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span> Portal de {{auth()->user()->name}}, aqui se agregan asignaturas </span>
                    <a href="{{route('asignaturas.index')}}" class="btn btn btn-dark btn-sm">Volver a la lista...</a>
                </div>
                <div class="card-body">     
                    <form action = "{{ route('asignaturas.store') }} " method = "POST" class = "mb-2" enctype="multipart/form-data">
                    @csrf     
                        <div class="text-center"> 
                        <h1 class="display-4 mb-4">Agregar asignaturas Root Only </h1>
                        </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <div class="input-group mr-sm-2">
                            <input type="text" class="form-control" placeholder="Nombre de asignatura" maxlength = '50' name = 'nombre' value = "{{old('nombre')}}"> 
                            </div>
                            <div class="text-muted">
                                <h6>Mínimo 5 caracteres</h6>
                            </div>
                        </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" placeholder="Descripción breve" maxlength = '255' name = 'descripcion' value = "{{old('descripcion')}}">
                        <div class="text-muted text-monospace">
                            <h6>Mínimo 5 caracteres</h6>
                        </div>                       
                    </div>
                    <div class="form-group col-md-3">
                        <input type="number" class="form-control" placeholder="Semestre" name = 'semestre' max = '8' value = "{{old('semestre')}}">
                        <div class="text-muted text-monospace">
                            <h6>Mínimo 5 caracteres</h6>
                        </div> 
                    <div>                                   
                    <div class="form-group col-md-3">
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>                   
                    </form>       
                    @if(session('mensaje'))
                    <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert">
                    <strong>ALERTA!</strong> {{session('mensaje')}}
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
@endsection