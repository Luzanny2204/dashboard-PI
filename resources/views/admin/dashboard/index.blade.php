@extends('layouts.app')
@section('title','Panel administrativo')
@section('content')
@if(\Auth::user()->hasRole('Admin'))
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

            @if(\Auth::user()->hasRole('Admin'))
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
            @endif

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
@elseif(\Auth::user()->hasRole('Entrenador tecnico'))
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
                                <h5 class="card-title">Mis jugadores</h5>

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
                    </div>
                    <div class="col-xxl-4 col-md-6 mb-4">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Total Posiciones</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$positionsCount}}</h6>
                                    </div>
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