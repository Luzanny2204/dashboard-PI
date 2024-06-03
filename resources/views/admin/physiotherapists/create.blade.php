@extends('layouts.app')
@section('title','Criação da fisioterapia')
@section('content')
<div>
    <h1>Criação da fisioterapia</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Painel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.physiotherapists.index')}}">Lista de fisioterapia</a></li>
            <li class="breadcrumb-item active">Criação da fisioterapia</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            <form action="{{route('admin.physiotherapists.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <span class="text-danger mt-1">* </span><span>Campo obrigatório.</span>
                    </div>
                    <div class="form-group">
                        <label for="consultation_date"><span class="text-danger">*</span> Data da consulta:</label>
                        <input type="date" name="consultation_date" class="form-control form-control-border" id="consultation_date" placeholder="Nome">
                    </div>
                    @error('consultation_date')
                    <span class="text-danger">{{$message}}</span>
                    @enderror


                    <div class="form-group mt-2">
                        <label for="user_id"><span class="text-danger">*</span>  Jogador:</label>
                        <select class="form-control createPlayer" name="user_id" id="user_id">
                            <option value="">--Selecionar jogador--</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('users')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="mt-2">
                    <label><span class="text-danger">*</span>  Descrição:</label>

                        <textarea name="description" id="description"></textarea>
                    
                    </div>
                    @error('description')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>
                <div class="d-flex mt-3">
                    <a href="{{route('admin.physiotherapists.index')}}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary mx-2">Criar Fisioterapia</button>
                </div>
            </form>
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
