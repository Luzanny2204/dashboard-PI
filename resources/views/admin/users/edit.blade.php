@extends('layouts.app')
@section('title','Edición de usuario')
@section('content')
<div>
    <h1>Edición de Usuario</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Panel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Listado de usuarios</a></li>
            <li class="breadcrumb-item active">Edición de Usuario</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            <form action="{{route('admin.users.update', $user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <span class="text-danger mt-1">* </span><span>Campo requerido.</span>
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre: <span class="text-danger">*</span> </label>
                        <input type="text" name="name" required class="form-control form-control-border" id="name" value="{{ $user->name }}" placeholder="Nombre del Usuario">
                    </div>
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="email">Correo electrónico: <span class="text-danger">*</span> </label>
                        <input type="email" name="email" required class="form-control form-control-border" id="email" value="{{ $user->email }}" placeholder="Correo electrónico">
                    </div>
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="password">Contraseña: </label>
                        <input type="password" name="password" class="form-control form-control-border" id="password" placeholder="Contraseña">
                    </div>
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="state_id">Estados: <span class="text-danger mt-1">* </span></label>
                        <select class="form-control" name="state_id" id="state_id">
                            <option value="">--Seleccionar estado--</option>
                            @foreach($states as $state)
                                <option value="{{$state->id}}" {{ $user->state_id == $state->id ? 'selected' : '' }}>{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('state_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <div class="row">
                            <div class="col-12">
                                <label for="roles">Rol del usuario: <span class="text-danger mt-1">* </span></label> <br>
                            </div>
                            <div class="col-12">
                                <select style="width: 100%" class="custom-select mt-2 form-control-border selectRoles" name="roles[]" id="roles" multiple>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>{{$role->name}}</option>
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
                        <input type="number" name="weight"  class="form-control form-control-border" id="weight" value="{{ $user->weight }}" placeholder="Peso del Usuario">
                    </div>
                    @error('weight')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="height">Altura:</label>
                        <input type="number" name="height"  class="form-control form-control-border" id="height" value="{{ $user->height }}" placeholder="Altura del Usuario">
                    </div>
                    @error('height')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="phone">Telefono:</label>
                        <input type="number" name="phone"  class="form-control form-control-border" id="phone" value="{{ $user->phone }}" placeholder="Telefono del Usuario">
                    </div>
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="team">Equipo: </label>
                        <select class="form-control teamsAll" name="team[]" id="team" >
                            <option value="">--Seleccionar Equipo--</option>
                            @foreach($teams as $team)
                                <option value="{{$team->id}}" {{ in_array($team->id, $user->teams->pluck('id')->toArray()) ? 'selected' : '' }}>{{$team->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('team')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="position_id">Posición: </label>
                        <select class="form-control" name="position_id" id="position_id">
                            <option value="">--Seleccionar posición--</option>
                            @foreach($positions as $position)
                                <option value="{{$position->id}}" {{ $user->position_id == $position->id ? 'selected' : '' }}>{{$position->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('position_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <a href="{{route('admin.users.index')}}" class="btn btn-secondary" >Volver</a>
                    <button type="submit" class="btn btn-warning">Actualizar Usuario</button>
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
    $(document).ready(function() {
        $('.teamsAll').select2();
    });
</script>
@endsection
