@extends('layouts.app')
@section('title','Listado de posiciones de los jugadores')
@section('content')
<div>
    <h1>Listado de posiciones de los jugadores</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Panel administrativo</a></li>
            <li class="breadcrumb-item active">Listado de posiciones de los jugadores</li>
        </ol>
    </nav>
</div>


<section class="section">
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPositions">
                Crear posición del jugador
            </button>

            <div class="modal fade" id="createPositions" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        @can('admin.positions.create')
                        <div class="modal-header">
                            <h5 class="modal-title">Crear posición del jugador</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('admin.positions.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="modal-body">
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger mt-1">* </span><span>Campo requerido.</span>
                                </div>
                                <div class="form-group">
                                    <label for="name"> Nombre: <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control form-control-border" id="name" placeholder="Nombre">
                                </div>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                                <div class="form-group mt-2">
                                    <label for="state_id">Estados: <span class="text-danger mt-1">* </span></label>
                                    <select class="form-control " name="state_id" id="state_id">
                                        <option value="">--Seleccionar estado--</option>
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}" {{ old('state_id') == $state->id ? 'selected' : '' }}>{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('state_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Crear posición</button>
                            </div>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-5">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($positions as $position)
                                <tr>
                                    <th scope="row">{{$position->id}}</th>
                                    <td>{{$position->name}}</td>
                                    <td>{{$position->state->name}}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('admin.positions.edit')
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#modaleditPositions_{{$loop->iteration}}" class="btn btn-warning"><i class="fa fa-edit"></i></button>


                                            <div class="modal fade" id="modaleditPositions_{{$loop->iteration}}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Editar posición del jugador</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{route('admin.positions.update',$position)}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="d-flex justify-content-end">
                                                                    <span class="text-danger mt-1">* </span><span>Campo requerido.</span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name"> Nombre: <span class="text-danger">*</span></label>
                                                                    <input type="text" name="name" value="{{$position->name}}" class="form-control form-control-border" id="name" placeholder="Nombre">
                                                                </div>
                                                                @error('name')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror

                                                                <div class="form-group mt-2">
                                                                    <label for="state_id">Estados: <span class="text-danger mt-1">* </span></label>
                                                                    <select class="form-control " name="state_id" id="state_id">
                                                                        <option value="">--Seleccionar estado--</option>
                                                                        @foreach($states as $state)
                                                                            <option value="{{$state->id}}"{{ $state->id == $position->state_id ? 'selected' : '' }} >{{$state->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                @error('state_id')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-warning">Editar estado</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endcan
                                            @can('admin.positions.destroy')
                                                <a style="margin-left: 5px" title="Eliminar" onclick="document.getElementById('eliminarEstado_{{ $loop->iteration }}').submit()" class="btn btn-danger ">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                                <form action="{{route('admin.positions.destroy',$position)}}"  method="POST" id="eliminarEstado_{{ $loop->iteration }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection