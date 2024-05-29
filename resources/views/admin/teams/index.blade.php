@extends('layouts.app')
@section('title','Listado de Equipos')
@section('content')
<div>
    <h1>Listado de Equipos</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Panel administrativo</a></li>
            <li class="breadcrumb-item active">Listado de Equipos</li>
        </ol>
    </nav>
</div>


<section class="section">
    <div class="row">
        <div class="col-12">
            @can('admin.teams.create')
                <a href="{{route('admin.teams.create')}}" class="btn btn-primary">
                    Crear equipo
                </a>
            @endcan
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
                                @foreach($teams as $team)
                                <tr>
                                    <th scope="row">{{$team->id}}</th>
                                    <td>{{$team->name}}</td>
                                    <td>{{$team->state->name}}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('admin.teams.edit')
                                            <a  href="{{route('admin.teams.edit',$team)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('admin.teams.show')
                                                <a  href="{{route('admin.teams.show',$team)}}" class="btn btn-success mx-2">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            @endcan
                                            @can('admin.teams.destroy')
                                                <a title="Eliminar" onclick="document.getElementById('eliminarTeams_{{ $loop->iteration }}').submit()" class="btn btn-danger ">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                                <form action="{{route('admin.teams.destroy',$team)}}"  method="POST" id="eliminarTeams_{{ $loop->iteration }}">
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