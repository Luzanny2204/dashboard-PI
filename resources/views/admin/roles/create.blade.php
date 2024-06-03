@extends('layouts.app')
@section('title', 'Criação de papéis')
@section('content')
    <!--Migalhas de pão-->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Novo Papel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Início</a></li>
                        <li class="breadcrumb-item active">Novo Papel</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!--Conteúdo - Formulário-->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default color-palette-box">
                <div class="card-body">
                    <div class="col-12">
                        <form action="{{route('admin.roles.store')}}" method="post">
                            @csrf
                            @method('Post')
                            <div class="form-group">
                                <label for="name_rol">Nome do seu Papel:</label>
                                <input type="text" class="form-control form-control-border" id="name_rol" name="name" placeholder="Nome do seu Papel">
                            </div>
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <h4>Lista de permissões atuais:</h4>
                            <label>Selecione as permissões que deseja dar ao seu papel:</label>
                            @foreach($permissions as $permission)
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->id}}" id="{{$permission->description}}">
                                        <label class="form-check-label" for="{{$permission->description}}">
                                            {{$permission->description}}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                            @error('permissions')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                           <div class="mt-3">
                           <a href="{{route('admin.roles.index')}}" class="btn btn-secondary bg-gradient-danger btn-lg">Cancelar</a>
                            <button type="submit" class="btn btn-primary bg-gradient-success mx-2 btn-lg">Criar papel</button>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
