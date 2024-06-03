@extends('layouts.app')
@section('title','Lista de papéis')
@section('content')
<div>
    <h1>Lista de papéis</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Painel administrativo</a></li>
            <li class="breadcrumb-item active">Lista de papéis</li>
        </ol>
    </nav>
</div>


<section class="section">
    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.roles.create')}}" class="btn btn-primary">
                Criar papel
            </a>
        </div>
        <div class="col-12 mt-5">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <th scope="row">{{$role->id}}</th>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('admin.roles.edit')
                                                <a title="Editar" href="{{route('admin.roles.edit',$role)}}"
                                                    class="me-2 btn btn-warning btn-company-danger">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('admin.roles.show')
                                                <a href="{{route('admin.roles.show',$role->id)}}"
                                                    class=" btn btn-success"><i class="fas fa-eye"></i>
                                                </a>
                                            @endcan
                                            @can('admin.roles.destroy')
                                                <a style="margin-left: 5px" title="Excluir" onclick="document.getElementById('eliminarRoles_{{ $loop->iteration }}').submit()" class="btn btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                                <form action="{{route('admin.roles.destroy',$role)}}" method="POST" id="eliminarRoles_{{ $loop->iteration }}">
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
