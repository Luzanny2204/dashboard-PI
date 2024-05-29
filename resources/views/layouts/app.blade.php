<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title') | PerformanceMax</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>

<form action="{{route('logout')}}" method="post" id="cerrar">
        @csrf
    </form>
<!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">PerformanceMax</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- Final del Logo -->
        
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
                <i class="bi bi-search"></i>
            </a>
            </li><!-- End Search Icon-->
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name={{ substr(auth()->user()->name, 0, 1)}}&color=FFFFFF&background=4154f1" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{\Auth::user()->name}}</span>
                </a><!-- End Profile Iamge Icon -->
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                    <h6>{{\Auth::user()->name}}</h6>
                    <span>{{\Auth::user()->getRoleNames()->first()}}</span>
                    </li>
                    <li>
                    <hr class="dropdown-divider">
                    </li>

                   
                    <li>
                    <hr class="dropdown-divider">
                    </li>

                    <li>
                    <a class="dropdown-item d-flex align-items-center" onclick="document.getElementById('cerrar').submit()" href="#">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sair</span>
                    </a>
                    </li>
                </ul>
            </li>
        </ul>
        </nav>
    </header>
    <!-- End Header -->

 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.dashboard')}}">
            <i class="bi bi-grid"></i>
            <span>Panel Administrativo</span>
            </a>
        </li>

        @can('admin.states.index')
        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.states.index')}}">
            <i class="bi bi-grid"></i>
            <span>Estados</span>
            </a>
        </li>
        @endcan

        @can('admin.roles.index')
        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.roles.index')}}">
            <i class="bi bi-grid"></i>
            <span>Roles y permisos</span>
            </a>
        </li>
        @endcan

        @can('admin.positions.index')
            <li class="nav-item">
                <a class="nav-link " href="{{route('admin.positions.index')}}">
                <i class="bi bi-grid"></i>
                <span>Posiciones J.G</span>
                </a>
            </li>
        @endcan

        @can('admin.teams.index')
        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.teams.index')}}">
            <i class="bi bi-grid"></i>
            <span>Equipos</span>
            </a>
        </li>
        @endcan

        @can('admin.users.index')
        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.users.index')}}">
            <i class="bi bi-grid"></i>
            <span>Usuarios</span>
            </a>
        </li>
        @endcan

        @can('admin.databiologies.index')
        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.databiologies.index')}}">
            <i class="bi bi-grid"></i>
            <span>Datos biológicos</span>
            </a>
        </li>
        @endcan

        @can('admin.menstrualcalendars.index')
        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.menstrualcalendars.index')}}">
            <i class="bi bi-grid"></i>
            <span>Calendario menstrual</span>
            </a>
        </li>
        @endcan

    </ul>
</aside>
<main id="main" class="main">

@yield('content')
</main>

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>PerformanceMax</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluir el JS de Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
  @include('components.flash_alert')
  <script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });
    $('.accordionExample').collapse();
  </script>

  @yield('script')
</body>
</html>