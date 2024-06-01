@extends('layouts.app')
@section('title','Detalle de la fisioterapia')
@section('content')
<div>
    <h1>Detalle de la fisioterapia</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Panel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.physiotherapists.index')}}">Listado de la fisioterapia</a></li>
            <li class="breadcrumb-item active">Detalle de la fisioterapia</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="modal-body">
                <div class="d-flex justify-content-end">
                    <span class="text-danger mt-1">* </span><span>Campo requerido.</span>
                </div>
                <div class="form-group">
                    <label for="consultation_date">Fecha consulta:</label>
                    <input type="date" disabled name="consultation_date" value="{{$physiotherapist->consultation_date}}" class="form-control form-control-border" id="consultation_date" placeholder="Nombre">
                </div>
             


                <div class="form-group mt-2">
                    <label for="user_id"> Jugador:</label>
                    <select class="form-control createPlayer" disabled name="user_id" id="user_id" >
                            <option value="{{$physiotherapist->user->id}}" >{{$physiotherapist->user->name}}</option>
                    </select>
                </div>
                @error('users')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="row mt-2">
                  <div class="col-12">
                    <label > Descripcion:</label>
                  </div>

                    <div class="col-12 mt-2 mb-2">
                        {!! $physiotherapist->description !!}
                    </div>
                
                </div>
                
            </div>
            <div class="d-flex mt-3">
                <a href="{{route('admin.physiotherapists.index')}}" class="btn btn-secondary" >Volver</a>
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
        placeholder: 'Describa aquí la situación del paciente',
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


