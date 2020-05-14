@extends('layouts.app')
@section('titulo')
Perfil {{ auth()->user()->name }}
@endsection
@section('content')
                <div class="row mb-3">
                    <div class="col-lg-4">
                        <div class="card mb-3">
                            <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="{{ asset('assets/img/avatars/tekashi.png') }}" width="160" height="160">
                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Cambiar Imagen</button></div>
                            </div>
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="text-primary font-weight-bold m-0">Mis Contribuciones</h6>
                            </div>
                            <div class="card-body">
                                <h4 class="small font-weight-bold">Certamenes<span class="float-right">0%</span></h4>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-danger" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"><span class="sr-only">20%</span></div>
                                </div>
                                <h4 class="small font-weight-bold">Laboratorios<span class="float-right">0%</span></h4>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-warning" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"><span class="sr-only">0%</span></div>
                                </div>
                                <h4 class="small font-weight-bold">Controles / Tareas <span class="float-right">0%</span></h4>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-primary" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"><span class="sr-only">0%</span></div>
                                </div>
                                <h4 class="small font-weight-bold">Otro<span class="float-right">0%</span></h4>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-info" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"><span class="sr-only">0%</span></div>
                                </div>                         
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row mb-3 d-none">
                            <div class="col">
                                <div class="card text-white bg-primary shadow">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col">
                                                <p class="m-0">Peformance</p>
                                                <p class="m-0"><strong>65.2%</strong></p>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                        </div>
                                        <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card text-white bg-success shadow">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col">
                                                <p class="m-0">Peformance</p>
                                                <p class="m-0"><strong>65.2%</strong></p>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                        </div>
                                        <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Tus datos</p>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="username"><strong>Nombre</strong></label><input class="form-control" type="text" value="{{ auth()->user()->name }}" name="username"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label for="email"><strong>Correo Electrónico</strong></label><input class="form-control" type="email" value="{{ auth()->user()->email }}" name="email"></div>
                                                </div>
                                            </div>                                           
                                            <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Cambiar Nombre</button></div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Contact Settings</p>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group"><label for="address"><strong>Address</strong></label><input class="form-control" type="text" placeholder="Sunset Blvd, 38" name="address"></div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="city"><strong>City</strong></label><input class="form-control" type="text" placeholder="Los Angeles" name="city"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label for="country"><strong>Country</strong></label><input class="form-control" type="text" placeholder="USA" name="country"></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Save&nbsp;Settings</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
@endsection