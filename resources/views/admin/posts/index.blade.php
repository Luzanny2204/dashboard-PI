@extends('layouts.app')
@section('title','Listado de cargo')
@section('content')
<div>
    <h1>Listado de cargo</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Panel administrativo</a></li>
            <li class="breadcrumb-item active">Listado de cargo</li>
        </ol>
    </nav>
</div>


<section class="section">
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPosts">
                Crear cargo
            </button>

            <div class="modal fade" id="createPosts" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crear cargo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="modal-body">
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger mt-1">* </span><span>Campo requerido.</span>
                                </div>
                                <div class="form-group">
                                    <label for="name"><span class="text-danger">*</span> Nombre:</label>
                                    <input type="text" name="name" class="form-control form-control-border" id="name" placeholder="Nombre">
                                </div>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Crear cargo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-5">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <th scope="row">{{$post->id}}</th>
                                    <td>{{$post->name}}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('admin.posts.edit')
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-edit-post_{{$loop->iteration}}" class="btn btn-warning"><i class="fa fa-edit"></i></button>


                                            <div class="modal fade" id="modal-edit-post_{{$loop->iteration}}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Editar cargo</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{route('admin.posts.update',$post)}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="d-flex justify-content-end">
                                                                    <span class="text-danger mt-1">* </span><span>Campo requerido.</span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name"><span class="text-danger">*</span> Nombre:</label>
                                                                    <input type="text" name="name" value="{{$post->name}}" class="form-control form-control-border" id="name" placeholder="Nombre">
                                                                </div>
                                                                @error('name')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-warning">Editar cargo</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endcan
                                            @can('admin.posts.destroy')
                                                <a style="margin-left: 5px" title="Eliminar" onclick="document.getElementById('eliminarPost_{{ $loop->iteration }}').submit()" class="btn btn-danger ">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                                <form action="{{route('admin.posts.destroy',$post)}}"  method="POST" id="eliminarPost_{{ $loop->iteration }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection