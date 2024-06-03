@extends('layouts.app')
@section('title','Criação do dado biológico')
@section('content')
<div>
    <h1>Criação do dado biológico</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Painel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.databiologies.index')}}">Lista de dados biológicos</a></li>
            <li class="breadcrumb-item active">Criação do dado biológico</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            <form action="{{route('admin.databiologies.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <span class="text-danger mt-1">* </span><span>Campo obrigatório.</span>
                    </div>

                    <div class="form-group">
                        <label for="waist"><span class="text-danger">*</span> Cintura:</label>
                        <input type="number" name="waist" class="form-control form-control-border" id="waist" placeholder="Cintura">
                    </div>
                    @error('waist')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="quadril"><span class="text-danger">*</span> Quadril:</label>
                        <input type="text" name="quadril" class="form-control form-control-border" id="quadril" placeholder="Quadril">
                    </div>
                    @error('quadril')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="bust"><span class="text-danger">*</span> Busto:</label>
                        <input type="number" name="bust" class="form-control form-control-border" id="bust" placeholder="Busto">
                    </div>
                    @error('bust')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="endurance"><span class="text-danger">*</span> Resistência:</label>
                        <input type="text" name="endurance" class="form-control form-control-border" id="endurance" placeholder="Resistência">
                    </div>
                    @error('endurance')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="speed"><span class="text-danger">*</span> Velocidade:</label>
                        <input type="text" name="speed" class="form-control form-control-border" id="speed" placeholder="Velocidade">
                    </div>
                    @error('speed')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="flexibility"><span class="text-danger">*</span> Flexibilidade:</label>
                        <input type="text" name="flexibility" class="form-control form-control-border" id="flexibility" placeholder="Flexibilidade">
                    </div>
                    @error('flexibility')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="temperature"><span class="text-danger">*</span> Temperatura:</label>
                        <input type="number" name="temperature" class="form-control form-control-border" id="temperature" placeholder="Temperatura">
                    </div>
                    @error('temperature')
                    <span class="text-danger">{{$message}}</span>
                    @enderror


                    <div class="form-group">
                        <label for="imc"><span class="text-danger">*</span> IMC:</label>
                        <input type="text" name="imc" class="form-control form-control-border" id="imc" placeholder="IMC">
                    </div>
                    @error('imc')
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
                    <a href="{{route('admin.databiologies.index')}}" class="btn btn-secondary" >Voltar</a>
                    <button type="submit" class="btn btn-primary  mx-2">Criar Dado Biológico</button>
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
