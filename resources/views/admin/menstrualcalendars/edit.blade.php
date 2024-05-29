@extends('layouts.app')
@section('title','Edición del calendario menstrual')
@section('content')
<div>
    <h1>Edición del calendario menstrual</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Panel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.menstrualcalendars.index')}}">Listado de los calendarios menstruales</a></li>
            <li class="breadcrumb-item active">Edición del calendario menstrual</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            <form action="{{route('admin.menstrualcalendars.update', $menstrualcalendar)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <span class="text-danger mt-1">* </span><span>Campo requerido.</span>
                    </div>

                    <div class="form-group">
                        <label for="last_period"><span class="text-danger">*</span> Fecha último periodo:</label>
                        <input type="date" value="{{$menstrualcalendar->last_period}}" name="last_period" class="form-control form-control-border" id="last_period">
                    </div>
                    @error('last_period')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="duration"><span class="text-danger">*</span> Duración por días:</label>
                        <input type="number" value="{{$menstrualcalendar->duration}}" name="duration" class="form-control form-control-border" id="duration" placeholder="Duración">
                    </div>
                    @error('duration')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="symptoms"><span class="text-danger">*</span> Sintomas:</label>
                        <input type="text" value="{{$menstrualcalendar->symptoms}}" name="symptoms" class="form-control form-control-border" id="symptoms" placeholder="Sintomas">
                    </div>
                    @error('symptoms')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="cervical_flux"><span class="text-danger">*</span> Fluido Cervical:</label>
                        <input type="text" value="{{$menstrualcalendar->cervical_flux}}" name="cervical_flux" class="form-control form-control-border" id="cervical_flux" placeholder="Fluido Cervical">
                    </div>
                    @error('cervical_flux')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="sexual_activity"><span class="text-danger">*</span> Actividad sexual:</label>
                        <input type="text" value="{{$menstrualcalendar->sexual_activity}}" name="sexual_activity" class="form-control form-control-border" id="sexual_activity" placeholder="Actividad sexual">
                    </div>
                    @error('sexual_activity')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    


                    <div class="form-group mt-2">
                        <label for="user_id">Usuarios:</label>
                        <select class="form-control createPlayers" name="user_id" id="user_id">
                            <option value="" selected disabled>Seleccionar</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}" {{ $user->id == $menstrualcalendar->user_id ? 'selected' : '' }}>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('user_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="d-flex mt-3">
                    <a href="{{route('admin.menstrualcalendars.index')}}" class="btn btn-secondary" >Volver</a>
                    <button type="submit" class="btn btn-warning  mx-2">Editar Calendario Menstrual</button>
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


