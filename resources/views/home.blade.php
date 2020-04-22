@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Estado de cuenta</div>
                    <div class="card-body">
                        @guest                        
                            <div class="alert alert-success" role="alert">
                                Inicie sesión para tener acceso a fucionalidades especiales
                            </div>
                        @else
                            <div class="alert alert-success" role="alert">
                                Sesión iniciada
                            </div>
                        @endguest
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
