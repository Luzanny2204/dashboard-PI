@extends('layouts.app')
@section('title','Panel administrativo')
@section('content')
@if(\Auth::user()->can('admin.dashboard'))
    <div class="pagetitle">
        <h1>Panel Administravo</h1>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-xxl-4 col-md-6 mb-4">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jugadores (Atletas | Hoje)</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$countPlayers}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6 mb-4">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Equipos (equipes)</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$countTeams}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <!-- <div class="col-xxl-4 col-xl-12 mb-4">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Comissão</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>1244</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- End Customers Card -->

                    <!-- Reports -->
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jugadores por Posición(Reportes Gerales <span>| Hoje</span>)</h5>
                                <div id="reportsChart"></div>
                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        var positionsData = @json($positionsData);

                                        // Generar colores aleatorios
                                        function getRandomColor() {
                                            var letters = '0123456789ABCDEF';
                                            var color = '#';
                                            for (var i = 0; i < 6; i++) {
                                                color += letters[Math.floor(Math.random() * 16)];
                                            }
                                            return color;
                                        }

                                        var positionColors = positionsData.map(() => getRandomColor());

                                        new ApexCharts(document.querySelector("#reportsChart"), {
                                            series: [{
                                                name: 'Users by Position',
                                                data: positionsData.map((data, index) => ({
                                                    x: data.x,
                                                    y: data.y,
                                                    fillColor: positionColors[index]
                                                }))
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'bar',
                                                toolbar: {
                                                    show: false
                                                }
                                            },
                                            plotOptions: {
                                                bar: {
                                                    horizontal: false,
                                                    columnWidth: '55%',
                                                    endingShape: 'rounded'
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                show: true,
                                                width: 2,
                                                colors: ['transparent']
                                            },
                                            xaxis: {
                                                categories: positionsData.map(data => data.x),
                                                title: {
                                                    text: 'Position'
                                                }
                                            },
                                            yaxis: {
                                                title: {
                                                    text: 'Number of Users'
                                                }
                                            },
                                            fill: {
                                                opacity: 1
                                            },
                                            tooltip: {
                                                y: {
                                                    formatter: function (val) {
                                                        return val + " users";
                                                    }
                                                }
                                            }
                                        }).render();
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                    <!-- End Reports -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Comissão Esportiva -->
                <div class="card">
                <div class="card-body pb-0">
                    <h5 class="card-title">Usuario por Roles (Comissão Esportiva<span>| Geral</span>)</h5>

                    <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            var rolesData = @json($rolesData);
                            echarts.init(document.querySelector("#trafficChart")).setOption({
                                tooltip: {
                                    trigger: 'item'
                                },
                                legend: {
                                    top: '5%',
                                    left: 'center'
                                },
                                series: [{
                                    name: 'Access From',
                                    type: 'pie',
                                    radius: ['40%', '70%'],
                                    avoidLabelOverlap: false,
                                    label: {
                                        show: false,
                                        position: 'center'
                                    },
                                    emphasis: {
                                        label: {
                                            show: true,
                                            fontSize: '18',
                                            fontWeight: 'bold'
                                        }
                                    },
                                    labelLine: {
                                        show: false
                                    },
                                    data: rolesData
                                }]
                            });
                        });
                    </script>
                </div>

                </div><!-- End Website Traffic -->

            </div><!-- End Right side columns -->

        </div>
    </section>

   
    <!-- <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Dados Atletas</h5>

                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Posição</th>
                                    <th scope="col">Equipe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><a href="#">#2644</a></th>
                                    <td>Raheem Lehner</td>
                                    <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                    <td>$165</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    @elseif(\Auth::user()->hasRole('Jugador'))

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

    @endif
@endsection