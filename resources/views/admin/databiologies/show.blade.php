@extends('layouts.app')
@section('title','Detalhe do dado biológico')
@section('content')
<div>
    <h1>Detalhe do dado biológico</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Painel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.databiologies.index')}}">Lista de dados biológicos</a></li>
            <li class="breadcrumb-item active">Detalhe do dado biológico</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            
                <div class="modal-body">
                <div class="form-group mt-2">
                        <label for="user_id">Usuário:</label>
                        <select class="form-control createPlayers" disabled name="user_id" id="user_id">
                            <option value="{{$databiology->user_id}}" selected>{{$databiology->user->name}}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="waist"> Cintura:</label>
                        <input type="number" disabled value="{{$databiology->waist}}" name="waist" class="form-control form-control-border" id="waist" placeholder="Cintura">
                    </div>
                    @error('waist')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="quadril"> Quadril:</label>
                        <input type="text" disabled name="quadril" value="{{$databiology->quadril}}" class="form-control form-control-border" id="quadril" placeholder="Quadril">
                    </div>
                    @error('quadril')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="bust"> Busto:</label>
                        <input type="number" disabled value="{{$databiology->bust}}" name="bust" class="form-control form-control-border" id="bust" placeholder="Busto">
                    </div>
                    @error('bust')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="endurance"> Resistência:</label>
                        <input type="text" disabled value="{{$databiology->endurance}}" name="endurance" class="form-control form-control-border" id="endurance" placeholder="Resistência">
                    </div>
                    @error('endurance')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="speed"> Velocidade:</label>
                        <input type="text" disabled value="{{$databiology->speed}}" name="speed" class="form-control form-control-border" id="speed" placeholder="Velocidade">
                    </div>
                    @error('speed')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="flexibility"> Flexibilidade:</label>
                        <input type="text" disabled value="{{$databiology->flexibility}}" name="flexibility" class="form-control form-control-border" id="flexibility" placeholder="Flexibilidade">
                    </div>
                    @error('flexibility')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="temperature"> Temperatura:</label>
                        <input type="number" disabled value="{{$databiology->temperature}}" name="temperature" class="form-control form-control-border" id="temperature" placeholder="Temperatura">
                    </div>
                    @error('temperature')
                    <span class="text-danger">{{$message}}</span>
                    @enderror


                    <div class="form-group">
                        <label for="imc"> IMC:</label>
                        <input type="text" disabled value="{{$databiology->imc}}" name="imc" class="form-control form-control-border" id="imc" placeholder="IMC">
                    </div>
                    @error('imc')
                    <span class="text-danger">{{$message}}</span>
                    @enderror


                    
                 
                </div>
                <div class="d-flex mt-3">
                    <a href="{{route('admin.databiologies.index')}}" class="btn btn-secondary" >Voltar</a>
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
