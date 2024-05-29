@extends('layouts.app')
@section('title','Creación de Equipo')
@section('content')
<div>
    <h1>Creación de Equipo</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Panel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.teams.index')}}">Listado de Equipo</a></li>
            <li class="breadcrumb-item active">Creación de Equipo</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            <form action="{{route('admin.teams.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <span class="text-danger mt-1">* </span><span>Campo requerido.</span>
                    </div>
                    <div class="form-group">
                        <label for="name"><span class="text-danger">*</span> Nombre:</label>
                        <input type="text" name="name" class="form-control form-control-border" id="name" placeholder="Nombre">
                    </div>
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="state_id">Estados: <span class="text-danger mt-1">* </span></label>
                        <select class="form-control " name="state_id" id="state_id">
                            <option value="">--Seleccionar estado--</option>
                            @foreach($states as $state)
                                <option value="{{$state->id}}" {{ old('state_id') == $state->id ? 'selected' : '' }}>{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('state_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="users">Jugadores:</label>
                        <select class="form-control createPlayers" name="users[]" id="users" multiple>
                            <option value="">--Seleccionar estado--</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('users')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="d-flex mt-3">
                    <a href="{{route('admin.teams.index')}}" class="btn btn-secondary" >Volver</a>
                    <button type="submit" class="btn btn-primary  mx-2">Crear Equipo</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.createPlayers').select2();
    });
</script>
@endsection


