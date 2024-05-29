
@extends('layouts.app')
@section('content')

<div class="pagetitle">
        <h1>Panel Administravo</h1>
        
    </div>
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="https://ui-avatars.com/api/?name={{ substr(auth()->user()->name, 0, 1)}}&color=FFFFFF&background=4154f1" alt="Profile" class="rounded-circle">
                <h2>{{\Auth::user()->name}}</h2>
                <h3>
                        @foreach (\Auth::user()->roles as $role)
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
                </ul>
                <div class="tab-content pt-4">
                    <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Nombre</div>
                        <div class="col-lg-9 col-md-8">{{\Auth::user()->name}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Correo</div>
                        <div class="col-lg-9 col-md-8">{{\Auth::user()->email}}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Estado</div>
                        <div class="col-lg-9 col-md-8">{{\Auth::user()->state->name}}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Equipo</div>
                        <div class="col-lg-9 col-md-8">
                        @if(\Auth::user()->teams->isNotEmpty())
                            @foreach(\Auth::user()->teams as $team)
                                {{ $team->name }}{{ !$loop->last ? ',' : '' }}
                            @endforeach
                        @else
                            Sin equipo
                        @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Posición</div>
                        <div class="col-lg-9 col-md-8">{{\Auth::user()->position->name ?? 'Sin posición'}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Altura</div>
                        <div class="col-lg-9 col-md-8">{{\Auth::user()->height ?? 'Sin la altura'}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Peso</div>
                        <div class="col-lg-9 col-md-8">{{\Auth::user()->weight ?? 'Sin el peso'}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Teléfeno</div>
                        <div class="col-lg-9 col-md-8">{{\Auth::user()->phone ?? 'Sin el teléfono'}}</div>
                    </div>
                    

                    </div>
                </div>
                </div>
            </div>

            </div>
        </div>
    </section>
@endsection