@extends('layouts.app')
@section('title', 'Edição do papel')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Papel: {{$role->name}} </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('admin.dashboard')}}">Início</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">Lista de Papéis</a></li>
                        <li class="breadcrumb-item active">Editar Papel</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default color-palette-box">
                <div class="card-body">
                    <div class="col-12">
                        <form action="{{route('admin.roles.update',$role)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nombre-role">Novo Nome do Papel:</label>
                                <input type="text" class="form-control form-control-border" id="nombre-role" name="name" value="{{$role->name}}">
                            </div>
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            @foreach($permissions as $permission)
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->id}}" @if(in_array($permission->id, $permisos)) checked @endif id="{{$permission->description}}">
                                        <label class="form-check-label" for="{{$permission->description}}">
                                            {{$permission->description}}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                            @error('permissions')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <button type="submit" class="btn btn-warning bg-gradient-success mt-3 btn-lg"><i class="fa fa-edit"></i> Editar Papel</button>
                            <a href="{{route('admin.roles.index')}}" class="btn btn-secondary mt-3 mx-2 bg-gradient-danger btn-lg"><i class="fa fa-close"></i> Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
