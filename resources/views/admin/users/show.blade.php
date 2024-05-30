@extends('layouts.app')
@section('title','Detalle de usuario')
@section('content')
<div class="pagetitle">
    <h1>Detalle del usaurio</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Panel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Listado de usuarios</a></li>
            <li class="breadcrumb-item active">Detalle de Usuario</li>
        </ol>
    </nav>
</div>
<section class="section profile">
    <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                    <img src="https://ui-avatars.com/api/?name={{ substr($user->name, 0, 1)}}&color=FFFFFF&background=4154f1" alt="Profile" class="rounded-circle">
                    <h2>{{$user->name}}</h2>
                    <h3>
                        @foreach ($user->roles as $role)
                        {{ $role->name }}
                        @if (!$loop->last)
                        ,
                        @endif
                        @endforeach
                    </h3>
                    <div class="social-links mt-2">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab">Detalle del Perfil</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " data-bs-toggle="tab" data-bs-target="#biology" aria-selected="true" role="tab">Datos Biológicos</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " data-bs-toggle="tab" data-bs-target="#calendar" aria-selected="true" role="tab">Calendario menstrual</button>
                        </li>
                        @can('admin.users.nutri')
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " data-bs-toggle="tab" data-bs-target="#nutri" aria-selected="true" role="tab">Nutricionista</button>
                        </li>
                        @endcan
                        @can('admin.users.psico')
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " data-bs-toggle="tab" data-bs-target="#psico" aria-selected="true" role="tab">Psicologia</button>
                        </li>
                        @endcan
                    </ul>
                    <div class="tab-content pt-4">
                        <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Nombre</div>
                                <div class="col-lg-9 col-md-8">{{$user->name}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Correo</div>
                                <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Estado</div>
                                <div class="col-lg-9 col-md-8">{{$user->state->name}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Equipo</div>
                                <div class="col-lg-9 col-md-8">
                                    @if($user->teams->isNotEmpty())
                                    @foreach($user->teams as $team)
                                    {{ $team->name }}{{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                    @else
                                    Sin equipo
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Posición</div>
                                <div class="col-lg-9 col-md-8">{{$user->position->name ?? 'Sin posición'}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Altura</div>
                                <div class="col-lg-9 col-md-8">{{$user->height ?? 'Sin la altura'}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Peso</div>
                                <div class="col-lg-9 col-md-8">{{$user->weight ?? 'Sin el peso'}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Teléfeno</div>
                                <div class="col-lg-9 col-md-8">{{$user->phone ?? 'Sin el teléfono'}}</div>
                            </div>

                        </div>
                        

                        <div class="tab-pane fade profile-overview  show" id="biology" role="tabpanel">
                            @foreach($getDataBiologies as $getDataBiology)
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Cintura</div>
                                <div class="col-lg-9 col-md-8">{{$getDataBiology->waist}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Quadril</div>
                                <div class="col-lg-9 col-md-8">{{$getDataBiology->quadril}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Busto</div>
                                <div class="col-lg-9 col-md-8">{{$getDataBiology->bust}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Resistencia</div>
                                <div class="col-lg-9 col-md-8">{{$getDataBiology->endurance}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Velocidad</div>
                                <div class="col-lg-9 col-md-8">{{$getDataBiology->speed}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Flexibilidad</div>
                                <div class="col-lg-9 col-md-8">{{$getDataBiology->flexibility}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Temperatura</div>
                                <div class="col-lg-9 col-md-8">{{$getDataBiology->temperature}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">IMC</div>
                                <div class="col-lg-9 col-md-8">{{$getDataBiology->imc}}</div>
                            </div>
                            @endforeach

                        </div>

                        <div class="tab-pane fade profile-overview  show" id="calendar" role="tabpanel">
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
                                        @foreach($getMenstrualCalendars as $menstrualcalendar)
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
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#show_calendar_{{$menstrualcalendar->id}}">
                                                        <i class="fa fa-eye"></i>
                                                    </button>

                                                    <div class="modal fade" id="show_calendar_{{$menstrualcalendar->id}}" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Detalle del calendario menstrual</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="last_period"> Fecha último periodo:</label>
                                                                        <input type="date" disabled value="{{$menstrualcalendar->last_period}}" name="last_period" class="form-control form-control-border" id="last_period">
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="duration"> Duración por días:</label>
                                                                        <input type="number" disabled value="{{$menstrualcalendar->duration}}" name="duration" class="form-control form-control-border" id="duration" placeholder="Duración">
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="symptoms"> Sintomas:</label>
                                                                        <input type="text" disabled value="{{$menstrualcalendar->symptoms}}" name="symptoms" class="form-control form-control-border" id="symptoms" placeholder="Sintomas">
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="cervical_flux"> Fluido Cervical:</label>
                                                                        <input type="text" disabled value="{{$menstrualcalendar->cervical_flux}}" name="cervical_flux" class="form-control form-control-border" id="cervical_flux" placeholder="Fluido Cervical">
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="sexual_activity"> Actividad sexual:</label>
                                                                        <input type="text" disabled value="{{$menstrualcalendar->sexual_activity}}" name="sexual_activity" class="form-control form-control-border" id="sexual_activity" placeholder="Actividad sexual">
                                                                    </div>

                                                                

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        @can('admin.users.nutri')
                        <div class="tab-pane fade profile-overview  show" id="nutri" role="tabpanel">
                           <div class="row">
                            <div class="col-12">
                                <form action="{{route('admin.nutritionists.edit', $user->id)}}" method="post">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Descripcion</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" style="height: 100px" name="description">
                                                @foreach($getNutritionists as $getNutritionist)
                                                    {{$getNutritionist->description}}
                                                @endforeach
                                            </textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-warning">Editar</button>
                                </form>
                            </div>
                           </div>
                        </div>
                        @endcan

                        @can('admin.users.psico')
                        <div class="tab-pane fade profile-overview  show" id="psico" role="tabpanel">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{route('admin.psicologies.edit', $user->id)}}" method="post">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Descripcion</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" style="height: 100px" name="description">
                                                @foreach($getPsicologies as $getPsicology)
                                                    {{$getPsicology->description}}
                                                @endforeach
                                            </textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-warning">Editar</button>
                                </form>
                            </div>
                           </div>
                        </div>
                        @endcan
                       
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('script')

@endsection