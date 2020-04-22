@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="width: 18rem;">
            <img src="{{asset($productos_detalles->imagen)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$productos_detalles->nombre}}</h5>
                <p class="card-text">{{$productos_detalles->descripcion}}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{$productos_detalles->id}}</li>
                <li class="list-group-item">${{$productos_detalles->precio}}</li>
                <li class="list-group-item">Dueño: {{ Auth::user()->name }}</li>
            </ul>
            <div class="card-body">
                <a href="/productos" class="card-link">Atras</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>        
    </div>
@endsection