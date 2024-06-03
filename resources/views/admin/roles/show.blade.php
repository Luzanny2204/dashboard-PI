@extends('layouts.app')
@section('title', 'Detalhe do papel')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Início</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">Lista de Papéis</a></li>
                        <li class="breadcrumb-item active">Detalhe do Papel</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default color-palette-box">
                <div class="card-body">
                    <h1>Detalhe do Papel: {{$role->name}}</h1>
                    <div class="col-12">
                        <div class="row">
                            <label>Lista de Permissões atribuídas a este Papel:</label>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive p-3">
                                        <ol>
                                            @foreach($role->permissions as $permission)
                                                <li><label>{{$permission->description}}</label></li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
