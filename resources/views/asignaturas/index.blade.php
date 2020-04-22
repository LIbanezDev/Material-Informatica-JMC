@extends('layouts.app')
@section('titulo')
Horario personal
@endsection
@section('content')
<div class="container text-center">
    <h1 class="display-4"> Horario Personal</h1>
    <div class="row">       
    @for($x = 1; $x <= 19; $x++)       
        @for($y = 1; $y <= 7; $y++)
        <span class="border">    
            <div class="col-sm">
                Lunes
            </div>
        </span>
        @endfor
        <div class="w-100"></div>
    @endfor
    </div>
</div>
@endsection