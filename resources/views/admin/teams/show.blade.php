@extends('layouts.app')
@section('title','Detalhe da Equipe')
@section('content')
<div>
    <h1>Detalhe da Equipe</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Painel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.teams.index')}}">Lista de Equipes</a></li>
            <li class="breadcrumb-item active">Detalhe da Equipe</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <span class="text-danger mt-1">*</span><span>Campo obrigatório.</span>
                    </div>
                    <div class="form-group">
                        <label for="name"><span class="text-danger">*</span> Nome:</label>
                        <input type="text" disabled name="name" class="form-control form-control-border" id="name" placeholder="Nome" value="{{ $team->name }}">
                    </div>

                    <div class="form-group mt-2">
                        <label for="user_id">Treinador: <span class="text-danger mt-1">*</span></label>
                        <select class="form-control" disabled name="user_id" id="user_id">
                                <option>{{ $team->userTeam->name ?? 'Sem treinador'}}</option>
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="state_id">Estado: <span class="text-danger mt-1">*</span></label>
                        <select class="form-control" disabled name="state_id" id="state_id">
                                <option>{{ $team->state->name }}</option>
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="users">Jogadores:</label>
                       @if($team->users->count() > 0)
                       <ol>
                            @foreach($team->users as  $user)
                                    <li>{{$user->name . ' | ' }} {{ $user->position->name ?? 'Sem posição'}}</li>
                            @endforeach
                        </ol>
                        @else
                        A equipe não conta com jogadores
                       @endif
                    </div>
                    @error('users')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex mt-3">
                    <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
        </div>
    </div>
</section>

@endsection

@section('script')

@endsection
