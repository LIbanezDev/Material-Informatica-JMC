@extends('layouts.app')
@section('titulo')
Ranking de colaboradores
@endsection
@section('content')
<h3 class="text-dark mb-4">Ranking de Colaboradores!</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Información de mejores colaboradores. Subir un certamen entrega 3 puntos, Controles y Laboratorios 2, y otro tipo de archivos solo 1 punto.</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Puntos totales</th>
                                        <th>Certamenes</th>
                                        <th>Labs</th>
                                        <th>Controles</th>
                                        <th>Otros</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usuarios_ranking as $user)                                  
                                    <tr>
                                        <td>
                                            <strong>
                                                @if(isset($_GET['page']) && $_GET['page'] > 1) 
                                                {{ $iterador++ }}.  
                                                @else
                                                {{ $iterador++ }}. 
                                                @endif
                                                <img class="rounded-circle mr-2" width="30" height="30" src="{{asset('imgsPerfil/'.$user->imagen) }}">{{ $user->name }}                                              
                                            </strong>
                                        </td>
                                        <td>{{ $user->puntos  }}</td>
                                        <td>{{ $user->certamenes }}</td>
                                        <td>{{ $user->laboratorios }}</td>
                                        <td>{{ $user->controles }}</td>
                                        <td>{{ $user->otros }}</td>
                                    </tr>
                                    @endforeach                                   
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>Nombre</strong></td>
                                        <td><strong>Puntos totales</strong></td>
                                        <td><strong>Certamenes</strong></td>
                                        <td><strong>Labs</strong></td>
                                        <td><strong>Controles</strong></td>
                                        <td><strong>Otros</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Mostrando  
                                    @if(isset($_GET['page']))
                                    {{ $paginacion * $_GET['page'] }}
                                    @else
                                    {{ $paginacion }}
                                    @endif
                                    de {{ $cantidad }}</p>
                            </div>
                            <div class="col-md-6">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    {{ $usuarios_ranking->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
@endsection