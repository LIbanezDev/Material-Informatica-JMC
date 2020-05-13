@extends('layouts.app')
@section('titulo')
{{$productos_detalles->nombre}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('imagenes/'.$productos_detalles->imagen)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$productos_detalles->nombre}}</h5>
                        <p class="card-text">{{$productos_detalles->descripcion}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">ID de producto: {{$productos_detalles->id}}</li>
                        <li class="list-group-item">${{$productos_detalles->precio}}</li>
                        <li class="list-group-item">Dueño: {{ Auth::user()->name }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-9">
                <div class="row justify-content-center">
                    <div class="col-md">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span> Hola {{auth()->user()->name}}, aquí puedes editar y eliminar el producto seleccionado</span>
                                <a href="/productos" class="btn btn btn-dark btn-sm">Volver a la lista...</a>
                            </div>
                            <div class="card-body">     
                                <form action = "{{route('productos.update', $productos_detalles->id)}}" method = "POST" class = "mb-2" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf     
                                    <div class="text-center"> 
                                    <h1 class="display-4 mb-4">Editar producto</h1>
                                    </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <div class="input-group mr-sm-2">
                                        <input type="text" class="form-control" placeholder="Nombre de producto" maxlength = '50' name = 'nombre' value = "{{$productos_detalles->nombre}}"> 
                                        </div>
                                        <div class="text-muted">
                                            <h6>Mínimo 5 caracteres</h6>
                                        </div>
                                    </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" placeholder="Descripción breve" name = 'descripcion' value = "{{$productos_detalles->descripcion}}">
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
                                    <input type="number" class="form-control" placeholder="Precio Unitario " name = 'precio' max = '10000000' value = "{{$productos_detalles->precio}}">
                                    <div class="text-muted">
                                        <h6>Precio mínimo: $10.000</h6>
                                    </div>
                                </div>                                    
                                <div class="form-group col-md-1">
                                    <button type="submit" class="btn btn-success">Editar</button>
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
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                                    Eliminar
                            </button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">                    
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Alerta!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                     </button>
                </div>
                <div class="modal-body">
                        ¿Está seguro que desea eliminar este producto?, no hay vuelta atras.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Me arrepentí</button>
                    <form action="{{route('productos.destroy', $productos_detalles->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Estoy seguro</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
@endsection