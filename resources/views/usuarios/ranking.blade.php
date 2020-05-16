@extends('layouts.app')
@section('titulo')
Ranking de colaboradores
@endsection
@section('content')
<h3 class="text-dark mb-4">Ranking de Colaboradores! <img src="{{ asset('assets/icons/ranking.svg')}}" alt="" height="40" width="40"></h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Información de mejores colaboradores.</p>
                        <p class="text-danger m-0 font-weight-bold">Certamen: 3 pts - Controles y laboratorios: 2 pts - Otro tipo de archivos: 1 pt</p>
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
                                                @if($iterador == 1)
                                                    <img src="{{ asset('assets/icons/one_ranking.svg')}}" alt="" height="30" width="30">
                                                    <?php $iterador++; ?>
                                                @else
                                                @if(isset($_GET['page']) && $_GET['page'] >= 1) 
                                                {{ $iterador++ }}.  
                                                @else
                                                {{ $iterador++ }}. 
                                                @endif
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