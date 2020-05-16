@extends('layouts.app')
@section('titulo')
{{ $asignatura_detalles->nombre }} | Material
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col border-dark justify-content-center">
      <div class="text-center">
        <h1 class="display">Lista de apuntes de {{ $asignatura_detalles->nombre }}</h1>
        <div class="text-muted">
          <h6>En construcción uwu</h6>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    @foreach($archivos_asignatura as $archivo)
    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-3">
        <a href="{{ asset('archivosAsignaturas/'.$archivo->numero_asignatura.'/'.$archivo->nombre) }}" target="_blank"><img src="{{ asset('assets/icons/'.$archivo->formato.'.svg')}}" alt="" height="40" width="40"> {{ $archivo->nombre }} </a>
        <a href="{{ asset('archivosAsignaturas/'.$archivo->numero_asignatura.'/'.$archivo->nombre) }}" download="{{ $archivo->nombre }}">
        <br>
        <button class="btn btn-secondary btn-sm btn-icon-split d-sm-inline-block mt-2">
          <span class="text-white icon">
            <i class="fas fa-file-download"></i>
          </span>
          <span class="text-white text"> Descargar</span>
        </button>
      </a>   
    </div>
    @endforeach
  </div>

@if(session('mensaje'))
  <div class="alert alert-success alert-dismissible fade show col-md-12 m-4" role="alert">
  <strong> {{ session('mensaje') }} </strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
  </div>   
@endif

<footer class="bg-white sticky-footer">
<div class="d-sm-flex justify-content-between align-items-center mb-4">
    <a class="btn btn-danger btn-icon-split d-sm-inline-block" role="button" href="{{ redirect()->back()->getTargetUrl() }}">
      <span class="text-white icon">
        <i class="fas fa-arrow-left"></i>
      </span>
      <span class="text-white text"> Volver Atrás </span>
    </a>
    <a class="btn btn-success btn-icon-split d-sm-inline-block" role="button" href="{{ redirect()->back()->getTargetUrl() }}" data-toggle="modal" data-target="#staticBackdrop">
      <span class="text-white icon">
        <i class="fas fa-file-upload"></i>
      </span>
      <span class="text-white text"> Subir Material </span>
    </a>
</div>
</footer>




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
        @if(Auth::check())
          <input class="d-none" type ="number" name="subido_por" value="{{auth()->user()->id}}">
        @endif
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
@endsection