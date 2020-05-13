@extends('layouts.app')
@section('titulo')
Asignaturas T.U en Informática
@endsection
@section('content')
<div class="container">
    <h1 class="display">Lista de asignaturas</h1>
    <a href="{{ route('asignaturas.create') }}">Crear asignaturas</a>
</div>
@endsection
