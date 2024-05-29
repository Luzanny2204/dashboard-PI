@extends('layouts.app')
@section('title','Edición del dato biológico')
@section('content')
<div>
    <h1>Edición del dato biológico</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Panel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.databiologies.index')}}">Listado de datos biológicos</a></li>
            <li class="breadcrumb-item active">Edición del dato biológico</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            <form action="{{route('admin.databiologies.update',$databiology)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <span class="text-danger mt-1">* </span><span>Campo requerido.</span>
                    </div>

                    <div class="form-group">
                        <label for="waist"><span class="text-danger">*</span> Cintura:</label>
                        <input type="number" value="{{$databiology->waist}}" name="waist" class="form-control form-control-border" id="waist" placeholder="Cintura">
                    </div>
                    @error('waist')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="quadril"><span class="text-danger">*</span> Quadril:</label>
                        <input type="text" name="quadril" value="{{$databiology->quadril}}" class="form-control form-control-border" id="quadril" placeholder="Quadril">
                    </div>
                    @error('quadril')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="bust"><span class="text-danger">*</span> Busto:</label>
                        <input type="number" value="{{$databiology->bust}}" name="bust" class="form-control form-control-border" id="bust" placeholder="Busto">
                    </div>
                    @error('bust')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="endurance"><span class="text-danger">*</span> Resistencia:</label>
                        <input type="text" value="{{$databiology->endurance}}" name="endurance" class="form-control form-control-border" id="endurance" placeholder="Resistencia">
                    </div>
                    @error('endurance')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="speed"><span class="text-danger">*</span> Velocidad:</label>
                        <input type="text" value="{{$databiology->speed}}" name="speed" class="form-control form-control-border" id="speed" placeholder="Velocidad">
                    </div>
                    @error('speed')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="flexibility"><span class="text-danger">*</span> Flexibilidad:</label>
                        <input type="text" value="{{$databiology->flexibility}}" name="flexibility" class="form-control form-control-border" id="flexibility" placeholder="Flexibilidad">
                    </div>
                    @error('flexibility')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label for="temperature"><span class="text-danger">*</span> Temperatura:</label>
                        <input type="number" value="{{$databiology->temperature}}" name="temperature" class="form-control form-control-border" id="temperature" placeholder="Temperatura">
                    </div>
                    @error('temperature')
                    <span class="text-danger">{{$message}}</span>
                    @enderror


                    <div class="form-group">
                        <label for="imc"><span class="text-danger">*</span> IMC:</label>
                        <input type="text" value="{{$databiology->imc}}" name="imc" class="form-control form-control-border" id="imc" placeholder="IMC">
                    </div>
                    @error('imc')
                    <span class="text-danger">{{$message}}</span>
                    @enderror


                    <div class="form-group mt-2">
                        <label for="user_id">Usuarios:</label>
                        <select class="form-control createPlayers" name="user_id" id="user_id">
                            <option value="" selected disabled>Seleccionar</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}" {{ $user->id == $databiology->user_id ? 'selected' : '' }}>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('user_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="d-flex mt-3">
                    <a href="{{route('admin.databiologies.index')}}" class="btn btn-secondary" >Volver</a>
                    <button type="submit" class="btn btn-warning  mx-2">Editar Dato Biológico</button>
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


