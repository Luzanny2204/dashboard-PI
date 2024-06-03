@extends('layouts.app')
@section('title','Edição de Equipe')
@section('content')
<div>
    <h1>Edição de Equipe</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Painel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.teams.index')}}">Lista de Equipes</a></li>
            <li class="breadcrumb-item active">Edição de Equipe</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.teams.update', $team->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <span class="text-danger mt-1">*</span><span>Campo obrigatório.</span>
                    </div>
                    <div class="form-group">
                        <label for="name"><span class="text-danger">*</span> Nome:</label>
                        <input type="text" name="name" class="form-control form-control-border" id="name" placeholder="Nome" value="{{ $team->name }}">
                    </div>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="state_id">Estados: <span class="text-danger mt-1">*</span></label>
                        <select class="form-control" name="state_id" id="state_id">
                            <option value="">--Selecionar estado--</option>
                            @foreach($states as $state)
                                <option value="{{ $state->id }}" {{ $team->state_id == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('state_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="user_id">Treinadores:</label>
                        <select class="form-control createTectrainer" name="user_id[]" id="user_id">
                            @foreach($usersTecTrainers as $usersTecTrainer)
                                <option value="{{ $usersTecTrainer->id }}" {{ $team->user_id == $usersTecTrainer->id ? 'selected' : '' }}>{{ $usersTecTrainer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('user_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="users">Jogadores:</label>
                        <select class="form-control createPlayers" name="users[]" id="users" multiple>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ in_array($user->id, $team->users->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('users')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex mt-3">
                    <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-warning mx-2">Atualizar Equipe</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.createTectrainer').select2();
    });
</script>
<script>
    $(document).ready(function() {
        $('.createPlayers').select2();
    });
</script>
@endsection
