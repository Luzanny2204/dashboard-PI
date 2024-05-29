@extends('layouts.app')
@section('title','Listado de usuarios')
@section('content')
<div>
    <h1>Listado de Usuarios</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Panel administrativo</a></li>
            <li class="breadcrumb-item active">Listado de Usuarios</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            @can('admin.users.create')
                <a class="btn btn-primary" href="{{route('admin.users.create')}}">
                    Crear usuario
                </a>
            @endcan
        </div>


        <div class="col-12">
            <div class="card">
                <div class="card-body pt-3">
                    <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab">Administradores</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#user-technical-trainer" aria-selected="false" tabindex="-1" role="tab">Entrenador tecnico</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#userNutritionists" aria-selected="false" tabindex="-1" role="tab">Nutricionistas</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false" tabindex="-1" role="tab">Jugadores</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Posición</th>
                                            <th scope="col">Equipo</th>
                                            <th scope="col">Rol</th>
                                            <th scope="col">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($userAdmins as $userAdmin)
                                        <tr>
                                            <td>{{$userAdmin->id}}</td>
                                            <td>{{$userAdmin->name}}</td>
                                            <td>{{$userAdmin->email}}</td>
                                            <td>{{$userAdmin->state->name}}</td>
                                            <td>{{$userAdmin->position->name ?? 'Sin posición'}}</td>
                                            <td>
                                            @if($userAdmin->teams->isNotEmpty())
                                                @foreach($userAdmin->teams as $team)
                                                    {{ $team->name }}{{ !$loop->last ? ',' : '' }}
                                                @endforeach
                                            @else
                                                Sin equipo
                                            @endif

                                            </td>
                                            <td>
                                                @foreach ($userAdmin->roles as $role)
                                                    {{ $role->name }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                @can('admin.users.edit')
                                                    <a class="btn btn-warning" href="{{route('admin.users.edit',$userAdmin->id)}}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('admin.users.show')
                                                    <a class="btn btn-success mx-2" href="{{route('admin.users.show',$userAdmin->id)}}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                @endcan
                                                @can('admin.users.destroy')
                                                    <form method="post" action="{{ route('admin.users.destroy', $userAdmin->id) }}">
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
                        <div class="tab-pane fade show  profile-overview" id="user-technical-trainer" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Posición</th>
                                            <th scope="col">Equipo</th>
                                            <th scope="col">Rol</th>
                                            <th scope="col">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($userTechnicalTrainer as $userTechnicalTrainer)
                                        <tr>
                                            <td>{{$userTechnicalTrainer->id}}</td>
                                            <td>{{$userTechnicalTrainer->name}}</td>
                                            <td>{{$userTechnicalTrainer->email}}</td>
                                            <td>{{$userTechnicalTrainer->state->name}}</td>
                                            <td>{{$userTechnicalTrainer->position->name ?? 'Sin posición'}}</td>
                                            <td>
                                            @if($userTechnicalTrainer->teams->isNotEmpty())
                                                @foreach($userTechnicalTrainer->teams as $team)
                                                    {{ $team->name }}{{ !$loop->last ? ',' : '' }}
                                                @endforeach
                                            @else
                                                Sin equipo
                                            @endif

                                            </td>
                                            <td>
                                                @foreach ($userTechnicalTrainer->roles as $role)
                                                    {{ $role->name }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                @can('admin.users.edit')
                                                    <a class="btn btn-warning" href="{{route('admin.users.edit',$userTechnicalTrainer->id)}}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('admin.users.show')
                                                    <a class="btn btn-success mx-2" href="{{route('admin.users.show',$userTechnicalTrainer->id)}}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                @endcan
                                                @can('admin.users.destroy')
                                                    <form method="post" action="{{ route('admin.users.destroy', $userTechnicalTrainer->id) }}">
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

                        <div class="tab-pane fade show  profile-overview" id="userNutritionists" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Posición</th>
                                            <th scope="col">Equipo</th>
                                            <th scope="col">Rol</th>
                                            <th scope="col">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($userNutritionists as $userNutritionist)
                                        <tr>
                                            <td>{{$userNutritionist->id}}</td>
                                            <td>{{$userNutritionist->name}}</td>
                                            <td>{{$userNutritionist->email}}</td>
                                            <td>{{$userNutritionist->state->name}}</td>
                                            <td>{{$userNutritionist->position->name ?? 'Sin posición'}}</td>
                                            <td>
                                            @if($userNutritionist->teams->isNotEmpty())
                                                @foreach($userNutritionist->teams as $team)
                                                    {{ $team->name }}{{ !$loop->last ? ',' : '' }}
                                                @endforeach
                                            @else
                                                Sin equipo
                                            @endif

                                            </td>
                                            <td>
                                                @foreach ($userNutritionist->roles as $role)
                                                    {{ $role->name }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                @can('admin.users.edit')
                                                    <a class="btn btn-warning" href="{{route('admin.users.edit',$userNutritionist->id)}}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('admin.users.show')
                                                    <a class="btn btn-success mx-2" href="{{route('admin.users.show',$userNutritionist->id)}}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                @endcan
                                                @can('admin.users.destroy')
                                                    <form method="post" action="{{ route('admin.users.destroy', $userNutritionist->id) }}">
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
                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Posición</th>
                                            <th scope="col">Equipo</th>
                                            <th scope="col">Rol</th>
                                            <th scope="col">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($userPlayers as $userPlayer)
                                        <tr>
                                            <td>{{$userPlayer->id}}</td>
                                            <td>{{$userPlayer->name}}</td>
                                            <td>{{$userPlayer->email}}</td>
                                            <td>{{$userPlayer->state->name}}</td>
                                            <td>{{$userPlayer->position->name ?? 'Sin posición'}}</td>
                                            <td>
                                            @if($userPlayer->teams->isNotEmpty())
                                                @foreach($userPlayer->teams as $team)
                                                    {{ $team->name }}{{ !$loop->last ? ',' : '' }}
                                                @endforeach
                                            @else
                                                Sin equipo
                                            @endif

                                            </td>
                                            <td>
                                                @foreach ($userPlayer->roles as $role)
                                                    {{ $role->name }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                @can('admin.users.edit')
                                                    <a class="btn btn-warning" href="{{route('admin.users.edit',$userPlayer->id)}}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('admin.users.show')
                                                    <a class="btn btn-success mx-2" href="{{route('admin.users.show',$userPlayer->id)}}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                @endcan
                                                @can('admin.users.destroy')
                                                    <form method="post" action="{{ route('admin.users.destroy', $userPlayer->id) }}">
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
        </div>

        <div class="col-12 mt-5">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    
                </div>
            </div>
        </div>

    </div>
</section>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.selectRoles').select2();
    });
</script>
@endsection

