@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span> Hola {{auth()->user()->name}}, aquí puedes agregar productos</span>
                    <a href="/productos" class="btn btn btn-dark btn-sm">Volver a la lista...</a>
                </div>
                <div class="card-body">     
                    <form action = "/productos" method = "POST" class = "mb-2" enctype="multipart/form-data">
                    @csrf     
                        <div class="text-center"> 
                        <h1 class="display-4 mb-4">Agregar producto</h1>
                        </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <div class="input-group mr-sm-2">
                            <input type="text" class="form-control" placeholder="Nombre de producto" maxlength = '50' name = 'nombre' value = "{{old('nombre')}}"> 
                            </div>
                            <div class="text-muted">
                                <h6>Mínimo 5 caracteres</h6>
                            </div>
                        </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" placeholder="Descripción breve" maxlength = '255' name = 'descripcion' value = "{{old('descripcion')}}">
                        <div class="text-muted text-monospace">
                            <h6>Mínimo 10 caracteres</h6>
                        </div>                       
                    </div>
                    <div class="form-group col-md-3">
                        <select class="form-control" name = "seccion">
                            <option selected>Mouses</option>
                            <option>Monitores</option>
                            <option>Teclados</option>
                            <option>Audífonos</option>
                            <option>Sillas Gamer</option>
                            <option>Joystick</option>
                            <option>Otra</option>
                        </select> 
                        <div class="text-muted text-monospace">
                            <h6>Sección</h6>
                        </div>                  
                    </div>
                    <div class="form-group col-md-2">
                        <input type="number" class="form-control" placeholder="Precio Unitario " name = 'precio' max = '10000000' value = "{{old('precio')}}">
                        <div class="text-muted">
                            <h6>Precio mínimo: $10.000</h6>
                        </div>
                    </div>                                    
                    <div class="form-group col-md-1">
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>                   
                    <div class="form-group col-md-4">
                        <input type="file" name="imagen">
                        <div class="text-muted text-monospace">
                            <h6>Imagen de producto</h6>
                        </div> 
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
                    @error('nombre')
                    <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                    <strong>ALERTA!</strong> Nombre de mínimo 5 caracteres
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div> 
                    @enderror
                    @error('descripcion')
                    <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                    <strong>ALERTA!</strong> Descripcion de minimo 10 caracteres
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror
                    @error('precio')
                    <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                    <strong>ALERTA!</strong> Precio debe ser de minimo $10.000
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection