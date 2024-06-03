@extends('layouts.app')
@section('title','Painel administrativo')
@section('content')
@if(\Auth::user()->hasRole('Administrador'))
    <div class="pagetitle">
        <h1>Painel Administrativo</h1>
    </div>

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- Players Card -->
                    <div class="col-xxl-4 col-md-6 mb-4">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Jogadores (Atletas | Hoje)</h5>
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
                    </div><!-- End Players Card -->

                    <!-- Teams Card -->
                    <div class="col-xxl-4 col-md-6 mb-4">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Equipes (equipes)</h5>
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
                    </div><!-- End Teams Card -->

                    <!-- Reports -->
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jogadores por Posição (Relatórios Gerais <span>| Hoje</span>)</h5>
                                <div id="reportsChart"></div>
                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        var positionsData = @json($positionsData);

                                        // Gerar cores aleatórias
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
                    </div><!-- End Reports -->
                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">
                <!-- User Roles -->
                <div class="card">
                    <div class="card-body pb-0">
                        <h5 class="card-title">Usuário por Roles (Comissão Esportiva<span>| Geral</span>)</h5>
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
                </div><!-- End User Roles -->
            </div><!-- End Right side columns -->
        </div>
    </section>

@elseif(\Auth::user()->hasRole('Treinador'))
    <div class="pagetitle">
        <h1>Painel Administrativo</h1>
    </div>

@endif
@endsection
