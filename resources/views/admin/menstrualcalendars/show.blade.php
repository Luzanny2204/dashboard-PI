@extends('layouts.app')
@section('title','Detalle del calendario menstrual')
@section('content')
<div>
    <h1>Detalle del calendario menstrual</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Panel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.menstrualcalendars.index')}}">Listado de los calendarios menstruales</a></li>
            <li class="breadcrumb-item active">Detalle del calendario menstrual</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="last_period"> Fecha último periodo:</label>
                        <input type="date" disabled value="{{$menstrualcalendar->last_period}}" name="last_period" class="form-control form-control-border" id="last_period">
                    </div>
               

                    <div class="form-group">
                        <label for="duration"> Duración por días:</label>
                        <input type="number" disabled value="{{$menstrualcalendar->duration}}" name="duration" class="form-control form-control-border" id="duration" placeholder="Duración">
                    </div>
                

                    <div class="form-group">
                        <label for="symptoms"> Sintomas:</label>
                        <input type="text" disabled value="{{$menstrualcalendar->symptoms}}" name="symptoms" class="form-control form-control-border" id="symptoms" placeholder="Sintomas">
                    </div>
                  

                    <div class="form-group">
                        <label for="cervical_flux"> Fluido Cervical:</label>
                        <input type="text" disabled value="{{$menstrualcalendar->cervical_flux}}" name="cervical_flux" class="form-control form-control-border" id="cervical_flux" placeholder="Fluido Cervical">
                    </div>
                  

                    <div class="form-group">
                        <label for="sexual_activity"> Actividad sexual:</label>
                        <input type="text" disabled value="{{$menstrualcalendar->sexual_activity}}" name="sexual_activity" class="form-control form-control-border" id="sexual_activity" placeholder="Actividad sexual">
                    </div>
                    
                    <div class="form-group mt-2">
                        <label for="user_id">Usuarios:</label>
                        <select class="form-control createPlayers" disabled name="user_id" id="user_id">
                            <option value="{{$menstrualcalendar->user_id}}" selected>{{$menstrualcalendar->user->name}}</option>
                        </select>
                    </div>
                 
                </div>
                <div class="d-flex mt-3">
                    <a href="{{route('admin.menstrualcalendars.index')}}" class="btn btn-secondary" >Volver</a>
                </div>
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


