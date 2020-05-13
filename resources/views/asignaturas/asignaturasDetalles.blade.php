@extends('layouts.app')
@section('titulo')
{{ $asignatura_detalles->nombre }}
@endsection
@section('content')
<div class="container">
<!-- Button trigger modal -->
<div class="row">
  <div class="col-4 border">
    <ul class="list-group list-group-flush">
      <h2 class="text-center font-weight">Asignaturas</h2>          
      @foreach($todas_las_asignaturas as $asignatura)
          <a href="{{route('asignaturas.show', $asignatura->id )}}" class="list-group-item list-group-item-action mb-3">-{{ $asignatura->nombre }} </a>
      @endforeach
    </ul>
  </div>
  <div class="col-8 border-dark">
    <h1 class="display text-center">Lista de archivos de {{ $asignatura_detalles->nombre }}</h1>
    @foreach($archivos_asignatura as $archivo)
    <h2>
      {{ $archivo->nombre }} 
    </h2>   
    <a href="{{ asset('archivosAsignaturas/'.$archivo->asignatura.'/'.$archivo->nombre) }}" download="{{ $archivo->nombre }}">
      <button type="button" class="btn btn-success">
        Descargar
      </button>
    </a>   
    <a href="{{ asset('archivosAsignaturas/'.$archivo->asignatura.'/'.$archivo->nombre) }}" target="_blank">
      <button type="button" class="btn btn-success">
        Vista previa
      </button>
    </a>
    @endforeach
  </div>
</div>
@if(session('mensaje'))
  <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert">
  <strong>ALERTA!</strong> {{session('mensaje')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
  </div>   
@endif
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Subir Archivo
</button>

<!-- Modal -->
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
                <h6>Ej: Certamen 1 </h6>
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
          <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success">Subir Archivo</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
@endsection