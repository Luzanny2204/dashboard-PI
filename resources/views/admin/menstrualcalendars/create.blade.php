@extends('layouts.app')
@section('title','Criação do calendário menstrual')
@section('content')
<div>
    <h1>Criação do calendário menstrual</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Painel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.menstrualcalendars.index')}}">Lista dos calendários menstruais</a></li>
            <li class="breadcrumb-item active">Criação do calendário menstrual</li>
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
                        <span class="text-danger mt-1">* </span><span>Campo obrigatório.</span>
                    </div>

                    <div class="form-group">
                        <label for="last_period"><span class="text-danger">*</span> Data do último período:</label>
                        <input type="date" name="last_period" class="form-control form-control-border" id="last_period">
                    </div>
                    @error('last_period')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="duration"><span class="text-danger">*</span> Duração em dias:</label>
                        <input type="number" name="duration" class="form-control form-control-border" id="duration" placeholder="Duração">
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
                        <label for="cervical_flux"><span class="text-danger">*</span> Fluxo Cervical:</label>
                        <input type="text" name="cervical_flux" class="form-control form-control-border" id="cervical_flux" placeholder="Fluxo Cervical">
                    </div>
                    @error('cervical_flux')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="sexual_activity"><span class="text-danger">*</span> Atividade sexual:</label>
                        <input type="text" name="sexual_activity" class="form-control form-control-border" id="sexual_activity" placeholder="Atividade sexual">
                    </div>
                    @error('sexual_activity')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="user_id">Usuários:</label>
                        <select class="form-control createPlayers" name="user_id" id="user_id">
                            <option value="" selected disabled>Selecionar</option>
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
                    <a href="{{route('admin.menstrualcalendars.index')}}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary mx-2">Criar Calendário Menstrual</button>
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
