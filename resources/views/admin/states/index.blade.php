@extends('layouts.app')
@section('title','Lista de estados')
@section('content')
<div>
    <h1>Lista de estados</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Painel administrativo</a></li>
            <li class="breadcrumb-item active">Lista de estados</li>
        </ol>
    </nav>
</div>


<section class="section">
    <div class="row">
        <div class="col-12">
            @can('admin.states.create')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createStates">
                Criar estado
            </button>

            <div class="modal fade" id="createStates" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Criar estado</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('admin.states.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="modal-body">
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger mt-1">* </span><span>Campo obrigatório.</span>
                                </div>
                                <div class="form-group">
                                    <label for="name"><span class="text-danger">*</span> Nome:</label>
                                    <input type="text" name="name" class="form-control form-control-border" id="name" placeholder="Nome">
                                </div>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Criar estado</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                                    <th scope="col">Nome</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($states as $state)
                                <tr>
                                    <th scope="row">{{$state->id}}</th>
                                    <td>{{$state->name}}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('admin.states.edit')
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-edit-estado_{{$loop->iteration}}" class="btn btn-warning"><i class="fa fa-edit"></i></button>


                                            <div class="modal fade" id="modal-edit-estado_{{$loop->iteration}}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Editar estado</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{route('admin.states.update',$state)}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="d-flex justify-content-end">
                                                                    <span class="text-danger mt-1">* </span><span>Campo obrigatório.</span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name"><span class="text-danger">*</span> Nome:</label>
                                                                    <input type="text" name="name" value="{{$state->name}}" class="form-control form-control-border" id="name" placeholder="Nome">
                                                                </div>
                                                                @error('name')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                                <button type="submit" class="btn btn-warning">Editar estado</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endcan
                                            @can('admin.states.destroy')
                                                <a style="margin-left: 5px" title="Excluir" onclick="document.getElementById('eliminarEstado_{{ $loop->iteration }}').submit()" class="btn btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                                <form action="{{route('admin.states.destroy',$state)}}" method="POST" id="eliminarEstado_{{ $loop->iteration }}">
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
