@extends('layouts.app')
@section('title','Criação de usuários')
@section('content')
<div>
    <h1>Criação de Usuários</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Painel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Lista de usuários</a></li>
            <li class="breadcrumb-item active">Criação de Usuários</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            <form action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <span class="text-danger mt-1">* </span><span>Campo obrigatório.</span>
                    </div>
                    <div class="form-group">
                        <label for="name">Nome: <span class="text-danger">*</span> </label>
                        <input type="text" name="name" required class="form-control form-control-border" id="name" placeholder="Nome do Usuário">
                    </div>
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="email">E-mail: <span class="text-danger">*</span> </label>
                        <input type="email" name="email" required class="form-control form-control-border" id="email" placeholder="E-mail">
                    </div>
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="password">Senha: <span class="text-danger">*</span> </label>
                        <input type="password" name="password" required class="form-control form-control-border" id="password" placeholder="Senha">
                    </div>
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="state_id">Estados: <span class="text-danger mt-1">* </span></label>
                        <select class="form-control " name="state_id" id="state_id">
                            <option value="">--Selecionar estado--</option>
                            @foreach($states as $state)
                                <option value="{{$state->id}}" >{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('state_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <div class="row">
                            <div class="col-12">
                                <label for="roles">Função do usuário: <span class="text-danger mt-1">* </span></label> <br>

                            </div>
                            <div class="col-12">
                                <select style="width: 100%" class="custom-select mt-2 form-control-border selectRoles" name="roles[]" id="roles" multiple>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    @error('roles')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="weight">Peso:</label>
                        <input type="number" name="weight"  class="form-control form-control-border" id="weight" placeholder="Peso do Usuário">
                    </div>
                    @error('weight')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="height">Altura:</label>
                        <input type="number" name="height"  class="form-control form-control-border" id="height" placeholder="Altura do Usuário">
                    </div>
                    @error('height')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="phone">Telefone:</label>
                        <input type="number" name="phone"  class="form-control form-control-border" id="phone" placeholder="Telefone do Usuário">
                    </div>
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="team">Equipe: </label>
                        <select class="form-control " name="team[]" id="team">
                            <option value="">--Selecionar Equipe--</option>
                            @foreach($teams as $team)
                                <option value="{{$team->id}}" >{{$team->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('team')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="position_id">Posição: </label>
                        <select class="form-control " name="position_id" id="position_id">
                            <option value="">--Selecionar posição--</option>
                            @foreach($positions as $position)
                                <option value="{{$position->id}}" >{{$position->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('position_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    
                </div>
                <div class="mt-3">
                    <a href="{{route('admin.users.index')}}" class="btn btn-secondary" >Voltar</a>
                    <button type="submit" class="btn btn-primary">Criar Usuário</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
        $(document).ready(function() {
            $('.selectRoles').select2();
        });
    </script>
@endsection
