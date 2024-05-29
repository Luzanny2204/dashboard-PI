@extends('layouts.app')
@section('title','Listado de Calendarios Menstruales')
@section('content')
<div>
    <h1>Listado de Calendarios Menstruales</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Panel administrativo</a></li>
            <li class="breadcrumb-item active">Listado de Calendarios Menstruales</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            @can('admin.menstrualcalendars.create')
                <a class="btn btn-primary" href="{{route('admin.menstrualcalendars.create')}}">
                    Crear Calendario menstrual
                </a>
            @endcan
        </div>

        <div class="col-12 mt-5">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Último periodo</th>
                                    <th scope="col">Duración</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($menstrualcalendars as $menstrualcalendar)
                                <tr>
                                    <td>{{$menstrualcalendar->id}}</td>
                                    <td>{{$menstrualcalendar->user->name}}</td>
                                    <td>{{$menstrualcalendar->last_period}}</td>
                                    <td>
                                    @if($menstrualcalendar->duration > 9)
                                        {{ $menstrualcalendar->duration . ' Días' }}
                                    @else
                                        {{ $menstrualcalendar->duration . ' Día' }}
                                    @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                        @can('admin.menstrualcalendars.edit')
                                            <a class="btn btn-warning" href="{{route('admin.menstrualcalendars.edit',$menstrualcalendar)}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('admin.menstrualcalendars.show')
                                            <a class="btn btn-success mx-2" href="{{route('admin.menstrualcalendars.show',$menstrualcalendar)}}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('admin.menstrualcalendars.destroy')
                                            <form method="post" action="{{ route('admin.menstrualcalendars.destroy', $menstrualcalendar) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger "><i class="fa fa-trash"></i></button>
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

@section('script')

@endsection


