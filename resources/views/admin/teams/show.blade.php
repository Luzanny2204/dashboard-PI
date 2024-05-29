@extends('layouts.app')
@section('title','Detalle del Equipo')
@section('content')
<div>
    <h1>Detalle del Equipo</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Panel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.teams.index')}}">Listado de Equipos</a></li>
            <li class="breadcrumb-item active">Detalle del Equipo</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <span class="text-danger mt-1">*</span><span>Campo requerido.</span>
                    </div>
                    <div class="form-group">
                        <label for="name"><span class="text-danger">*</span> Nombre:</label>
                        <input type="text" disabled name="name" class="form-control form-control-border" id="name" placeholder="Nombre" value="{{ $team->name }}">
                    </div>

                    <div class="form-group mt-2">
                        <label for="state_id">Estados: <span class="text-danger mt-1">*</span></label>
                        <select class="form-control " disabled name="state_id" id="state_id">
                                <option value="{{ $team->state_id }}" >{{ $team->state->name }}</option>
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="users">Jugadores:</label>
                        @foreach($team->users as $user)
                            <ul >{{ $user->name }}</ul>
                        @endforeach
                    </div>
                    @error('users')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex mt-3">
                    <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">Volver</a>
                </div>
        </div>
    </div>
</section>

@endsection

@section('script')

@endsection
