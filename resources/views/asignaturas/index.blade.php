@extends('layouts.app')
@section('content')
    <div class="container text-center">
            <h1 class="display-4"> Horario Personal</h1>
        <div class="row">       
    @for($x = 1; $x <= 18; $x++)       
        @for($y = 1; $y <= 7; $y++)
        <span class="border">    
            <div class="col-sm">
                bloque/dia
            </div>
        </span>
        @endfor
        <div class="w-100"></div>
    @endfor
        </div>
    </div>
</div>
@endsection