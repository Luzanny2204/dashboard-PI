@extends('layouts.app')
@section('title','Detalhe do usuário')
@section('content')
<div class="pagetitle">
    <h1>Detalhe do usuário</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Painel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Lista de usuários</a></li>
            <li class="breadcrumb-item active">Detalhe do Usuário</li>
        </ol>
    </nav>
</div>
<section class="section profile">
    <div class="row">
        <div class="col-xl-3">

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

        <div class="col-xl-9">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab">Det. Perfil</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#biology" aria-selected="true" role="tab">Dados Biológicos</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#calendar" aria-selected="true" role="tab">Cal. menstrual</button>
                        </li>
                        @can('admin.users.nutri')
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nutri" aria-selected="true" role="tab">Nutricionista</button>
                        </li>
                        @endcan
                        @can('admin.users.psico')
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#psico" aria-selected="true" role="tab">Psicologia</button>
                        </li>
                        @endcan
                    </ul>
                    <div class="tab-content pt-4">
                        <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Nome</div>
                                <div class="col-lg-9 col-md-8">{{$user->name}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">E-mail</div>
                                <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Estado</div>
                                <div class="col-lg-9 col-md-8">{{$user->state->name}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Equipe</div>
                                <div class="col-lg-9 col-md-8">
                                    @if($user->teams->isNotEmpty())
                                    @foreach($user->teams as $team)
                                    {{ $team->name }}{{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                    @else
                                    Sem equipe
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Posição</div>
                                <div class="col-lg-9 col-md-8">{{$user->position->name ?? 'Sem posição'}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Altura</div>
                                <div class="col-lg-9 col-md-8">{{$user->height ?? 'Sem altura'}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Peso</div>
                                <div class="col-lg-9 col-md-8">{{$user->weight ?? 'Sem peso'}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Telefone</div>
                                <div class="col-lg-9 col-md-8">{{$user->phone ?? 'Sem telefone'}}</div>
                            </div>

                        </div>
                        

                        <div class="tab-pane fade profile-overview show" id="biology" role="tabpanel">
                            @if(count($getDataBiologies) > 0)
                                @foreach($getDataBiologies as $getDataBiology)
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Cintura</div>
                                        <div class="col-lg-9 col-md-8">{{$getDataBiology->waist}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Quadril</div>
                                        <div class="col-lg-9 col-md-8">{{$getDataBiology->quadril}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Busto</div>
                                        <div class="col-lg-9 col-md-8">{{$getDataBiology->bust}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Resistência</div>
                                        <div class="col-lg-9 col-md-8">{{$getDataBiology->endurance}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Velocidade</div>
                                        <div class="col-lg-9 col-md-8">{{$getDataBiology->speed}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Flexibilidade</div>
                                        <div class="col-lg-9 col-md-8">{{$getDataBiology->flexibility}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Temperatura</div>
                                        <div class="col-lg-9 col-md-8">{{$getDataBiology->temperature}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">IMC</div>
                                        <div class="col-lg-9 col-md-8">{{$getDataBiology->imc}}</div>
                                    </div>
                                @endforeach
                            @else
                            Sem dados biológicos
                            @endif

                        </div>

                        <div class="tab-pane fade profile-overview show" id="calendar" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Usuário</th>
                                            <th scope="col">Último período</th>
                                            <th scope="col">Duração</th>
                                            <th scope="col">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($getMenstrualCalendars) > 0)
                                            @foreach($getMenstrualCalendars as $menstrualcalendar)
                                            <tr>
                                                <td>{{$menstrualcalendar->id}}</td>
                                                <td>{{$menstrualcalendar->user->name}}</td>
                                                <td>{{$menstrualcalendar->last_period}}</td>
                                                <td>
                                                    @if($menstrualcalendar->duration > 9)
                                                    {{ $menstrualcalendar->duration . ' Dias' }}
                                                    @else
                                                    {{ $menstrualcalendar->duration . ' Dia' }}
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
                                                                        <h5 class="modal-title">Detalhe do calendário menstrual</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="last_period"> Data do último período:</label>
                                                                            <input type="date" disabled value="{{$menstrualcalendar->last_period}}" name="last_period" class="form-control form-control-border" id="last_period">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="duration"> Duração em dias:</label>
                                                                            <input type="number" disabled value="{{$menstrualcalendar->duration}}" name="duration" class="form-control form-control-border" id="duration" placeholder="Duração">
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
                                                                            <label for="sexual_activity"> Atividade sexual:</label>
                                                                            <input type="text" disabled value="{{$menstrualcalendar->sexual_activity}}" name="sexual_activity" class="form-control form-control-border" id="sexual_activity" placeholder="Atividade sexual">
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                        <tr>
                                            <td class="text-center" colspan="5">
                                                Sem registros de calendários menstruais
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        @can('admin.users.nutri')
                        <div class="tab-pane fade profile-overview show" id="nutri" role="tabpanel">
                           <div class="row">
                            <div class="col-12">
                                <form action="{{route('admin.nutritionists.edit', $user->id)}}" method="post">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="inputPassword" class="form-label">Descrição</label>
                                        </div>
                                        <div class="col-12">
                                            <textarea class="form-control" id="descriptionNutri" name="description">
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
                        <div class="tab-pane fade profile-overview show" id="psico" role="tabpanel">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{route('admin.psicologies.edit', $user->id)}}" method="post">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-12 col-form-label">Descrição</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" id="descriptionPsy" name="description">
                                                @foreach($getPsicologies as $getPsicology)
                                                    {!!$getPsicology->description!!}
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
<script>
    $('#descriptionNutri').summernote({
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

<script>
    $('#descriptionPsy').summernote({
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
