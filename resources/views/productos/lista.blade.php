@extends('layouts.app')
@section('titulo')
Inventario de {{Auth::user()->name}}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-2 p-2">
            <h2 class="text-center font-weight-bold">Secciones</h2>
                <ul class="list-group list-group-flush">          
                    @foreach($seccion_cantidad as $seccion => $cantidad)
                        <a href="{{route('seccion', $seccion)}}" class="list-group-item list-group-item-action mb-3">- {{$seccion}} ({{$cantidad}})</a>
                    @endforeach
                        <a href="/productos" class="list-group-item list-group-item-action active disabled mb-3">- Ver todos</a>
                </ul>
            <a href="productos/create"><button type = "button" class="btn btn-success">Crear nuevo producto</button></a> 
        </div>
        <div class="col-12 col-lg-10">
            <div class="row">
                @foreach($productos as $item)
                    <div class="col-sm-4">                       
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset($item->imagen)}}" class="card-img-top" alt="..." height="200">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->nombre}}</h5>
                                <p class="card-text">{{$item->descripcion}}</p>
                                <p class="card-text font-weight-bold">${{$item->precio}}</p>
                                <a href="/productos/{{$item->id}}"><button type="button" class="btn btn-secondary">Especificaciones</button></a>
                            </div>
                        </div>
                    </div>                   
                @endforeach               
            </div>                           
        </div>       
    </div>  
</div>
@endsection


