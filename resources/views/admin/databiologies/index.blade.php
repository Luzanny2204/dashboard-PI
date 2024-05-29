@extends('layouts.app')
@section('title','Listado de Datos Biológicos')
@section('content')
<div>
    <h1>Listado de Datos Biológicos</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Panel administrativo</a></li>
            <li class="breadcrumb-item active">Listado de Datos Biológicos</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            @can('admin.databiologies.create')
                <a class="btn btn-primary" href="{{route('admin.databiologies.create')}}">
                    Crear Dato Biológico
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
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Velocidad</th>
                                    <th scope="col">Resistencia</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($databiologies as $databiology)
                                <tr>
                                    <td>{{$databiology->id}}</td>
                                    <td>{{$databiology->user->name}}</td>
                                    <td>{{$databiology->speed}}</td>
                                    <td>{{$databiology->endurance}}</td>
                                    <td>
                                        <div class="d-flex">
                                        @can('admin.databiologies.edit')
                                            <a class="btn btn-warning" href="{{route('admin.databiologies.edit',$databiology)}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('admin.databiologies.show')
                                            <a class="btn btn-success mx-2" href="{{route('admin.databiologies.show',$databiology)}}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('admin.databiologies.destroy')
                                            <form method="post" action="{{ route('admin.databiologies.destroy', $databiology) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger "><i class="fa fa-trash"></i></button>
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

@section('script')

@endsection


