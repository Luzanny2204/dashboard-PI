@extends('layouts.app')
@section('title','Creación de la fisioterapia')
@section('content')
<div>
    <h1>Creación de la fisioterapia</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Panel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.physiotherapists.index')}}">Listado de la fisioterapia</a></li>
            <li class="breadcrumb-item active">Creación de la fisioterapia</li>
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
                        <span class="text-danger mt-1">* </span><span>Campo requerido.</span>
                    </div>
                    <div class="form-group">
                        <label for="consultation_date"><span class="text-danger">*</span> Fecha consulta:</label>
                        <input type="date" name="consultation_date" class="form-control form-control-border" id="consultation_date" placeholder="Nombre">
                    </div>
                    @error('consultation_date')
                    <span class="text-danger">{{$message}}</span>
                    @enderror


                    <div class="form-group mt-2">
                        <label for="user_id"><span class="text-danger">*</span>  Jugador:</label>
                        <select class="form-control createPlayer" name="user_id" id="user_id" >
                            <option value="">--Seleccionar jugador--</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('users')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="mt-2">
                    <label ><span class="text-danger">*</span>  Descripcion:</label>

                        <textarea name="description" id="description"></textarea>
                    
                    </div>
                    @error('description')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>
                <div class="d-flex mt-3">
                    <a href="{{route('admin.physiotherapists.index')}}" class="btn btn-secondary" >Volver</a>
                    <button type="submit" class="btn btn-primary  mx-2">Crear Fisioterapia</button>
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


