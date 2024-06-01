@extends('layouts.app')
@section('title','Listado de Fisioterapias')
@section('content')
<div>
    <h1>Listado de Fisioterapias</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Panel administrativo</a></li>
            <li class="breadcrumb-item active">Listado de Fisioterapias</li>
        </ol>
    </nav>
</div>


<section class="section">
    <div class="row">
        <div class="col-12">
            @can('admin.physiotherapists.create')
                <a href="{{route('admin.physiotherapists.create')}}" class="btn btn-primary">
                    Crear Fisioterapia
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
                                    <th scope="col">Fecha consulta</th>
                                    <th scope="col">Jugador</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($physiotherapists as $physiotherapist)
                                <tr>
                                    <th scope="row">{{$physiotherapist->id}}</th>
                                    <td>{{$physiotherapist->consultation_date}}</td>
                                    <td>{{$physiotherapist->user->name ?? 'Sin jugador'}}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('admin.physiotherapists.edit')
                                            <a  href="{{route('admin.physiotherapists.edit',$physiotherapist)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('admin.physiotherapists.show')
                                                <a  href="{{route('admin.physiotherapists.show',$physiotherapist)}}" class="btn btn-success mx-2">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            @endcan
                                            @can('admin.physiotherapists.destroy')
                                                <a title="Eliminar" onclick="document.getElementById('eliminarphysiotherapists_{{ $loop->iteration }}').submit()" class="btn btn-danger ">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                                <form action="{{route('admin.physiotherapists.destroy',$physiotherapist)}}"  method="POST" id="eliminarphysiotherapists_{{ $loop->iteration }}">
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