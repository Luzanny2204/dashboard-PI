@extends('layouts.app')
@section('title','Panel administrativo')
@section('content')



<div class="pagetitle">
    <h1>Admin Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6 mb-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Atletas <span>| Hoje</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>145</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6 mb-4">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Equipes</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>8</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12 mb-4">
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
                </div><!-- End Customers Card -->

                <!-- Reports -->
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Reportes Gerales <span>| Hoje</span></h5>

                            <!-- Line Chart -->
                            <div id="reportsChart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#reportsChart"), {
                                        series: [{
                                            name: 'Sales',
                                            data: [31, 40, 28, 51, 42, 82, 56],
                                        }, {
                                            name: 'Revenue',
                                            data: [11, 32, 45, 32, 34, 52, 41]
                                        }, {
                                            name: 'Customers',
                                            data: [15, 11, 32, 18, 9, 24, 11]
                                        }],
                                        chart: {
                                            height: 350,
                                            type: 'area',
                                            toolbar: {
                                                show: false
                                            },
                                        },
                                        markers: {
                                            size: 4
                                        },
                                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                        fill: {
                                            type: "gradient",
                                            gradient: {
                                                shadeIntensity: 1,
                                                opacityFrom: 0.3,
                                                opacityTo: 0.4,
                                                stops: [0, 90, 100]
                                            }
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        stroke: {
                                            curve: 'smooth',
                                            width: 2
                                        },
                                        xaxis: {
                                            type: 'datetime',
                                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                                        },
                                        tooltip: {
                                            x: {
                                                format: 'dd/MM/yy HH:mm'
                                            },
                                        }
                                    }).render();
                                });
                            </script>
                            <!-- End Line Chart -->

                        </div>
                    </div>
                </div><!-- End Reports -->

            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

            <!-- Comissão Esportiva -->
            <div class="card">
                <div class="card-body pb-0">
                    <h5 class="card-title">Comissão Esportiva<span>| Geral</span></h5>

                    <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
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
                                    data: [{
                                        value: 1048,
                                        name: 'Treinadores Esportivos'
                                    },
                                    {
                                        value: 735,
                                        name: 'Nutricionistas'
                                    },
                                    {
                                        value: 580,
                                        name: 'Psicologos'
                                    },
                                    {
                                        value: 484,
                                        name: 'Fisioterapeutas'
                                    },
                                    ]
                                }]
                            });
                        });
                    </script>

                </div>
            </div><!-- End Website Traffic -->

        </div><!-- End Right side columns -->

    </div>
</section>

<!-- Dados Atletas -->
<section class="section">
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
                            <!-- Agrega más filas según sea necesario -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Dados Atletas -->




@endsection