@extends('layouts.app')
@section('title','Creación del calendario menstrual')
@section('content')
<div>
    <h1>Creación del calendario menstrual</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Panel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.menstrualcalendars.index')}}">Listado de los calendarios menstruales</a></li>
            <li class="breadcrumb-item active">Creación del calendario menstrual</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            <form action="{{route('admin.menstrualcalendars.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <span class="text-danger mt-1">* </span><span>Campo requerido.</span>
                    </div>

                    <div class="form-group">
                        <label for="last_period"><span class="text-danger">*</span> Fecha último periodo:</label>
                        <input type="date" name="last_period" class="form-control form-control-border" id="last_period">
                    </div>
                    @error('last_period')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="duration"><span class="text-danger">*</span> Duración por días:</label>
                        <input type="number" name="duration" class="form-control form-control-border" id="duration" placeholder="Duración">
                    </div>
                    @error('duration')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="symptoms"><span class="text-danger">*</span> Sintomas:</label>
                        <input type="text" name="symptoms" class="form-control form-control-border" id="symptoms" placeholder="Sintomas">
                    </div>
                    @error('symptoms')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="cervical_flux"><span class="text-danger">*</span> Fluido Cervical:</label>
                        <input type="text" name="cervical_flux" class="form-control form-control-border" id="cervical_flux" placeholder="Fluido Cervical">
                    </div>
                    @error('cervical_flux')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="sexual_activity"><span class="text-danger">*</span> Actividad sexual:</label>
                        <input type="text" name="sexual_activity" class="form-control form-control-border" id="sexual_activity" placeholder="Actividad sexual">
                    </div>
                    @error('sexual_activity')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    


                    <div class="form-group mt-2">
                        <label for="user_id">Usuarios:</label>
                        <select class="form-control createPlayers" name="user_id" id="user_id">
                            <option value="" selected disabled>Seleccionar</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('user_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="d-flex mt-3">
                    <a href="{{route('admin.menstrualcalendars.index')}}" class="btn btn-secondary" >Volver</a>
                    <button type="submit" class="btn btn-primary  mx-2">Crear Calendario menstrual</button>
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


