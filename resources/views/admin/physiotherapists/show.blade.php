@extends('layouts.app')
@section('title','Detalhe da fisioterapia')
@section('content')
<div>
    <h1>Detalhe da fisioterapia</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Painel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.physiotherapists.index')}}">Lista de fisioterapias</a></li>
            <li class="breadcrumb-item active">Detalhe da fisioterapia</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="modal-body">
                <div class="d-flex justify-content-end">
                    <span class="text-danger mt-1">* </span><span>Campo obrigatório.</span>
                </div>
                <div class="form-group">
                    <label for="consultation_date">Data da consulta:</label>
                    <input type="date" disabled name="consultation_date" value="{{$physiotherapist->consultation_date}}" class="form-control form-control-border" id="consultation_date" placeholder="Nome">
                </div>
             


                <div class="form-group mt-2">
                    <label for="user_id"> Jogador:</label>
                    <select class="form-control createPlayer" disabled name="user_id" id="user_id" >
                            <option value="{{$physiotherapist->user->id}}" >{{$physiotherapist->user->name}}</option>
                    </select>
                </div>
                @error('users')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="row mt-2">
                  <div class="col-12">
                    <label > Descrição:</label>
                  </div>

                    <div class="col-12 mt-2 mb-2">
                        {!! $physiotherapist->description !!}
                    </div>
                
                </div>
                
            </div>
            <div class="d-flex mt-3">
                <a href="{{route('admin.physiotherapists.index')}}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
   $(document).ready(function() {
        $('.createPlayer').select2();
    });
</script>

<script>
    $('#description').summernote({
        placeholder: 'Descreva aqui a situação do paciente',
        tabsize: 2,
        height: 120,
        toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
@endsection
