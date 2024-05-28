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
        <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Busqueda" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
        </div><!-- End Search Bar -->
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
                <i class="bi bi-search"></i>
            </a>
            </li><!-- End Search Icon-->
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name={{ substr(auth()->user()->name, 0, 1)}}&color=7F9CF5&background=EBF4FF" alt="Profile" class="rounded-circle">
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
                    <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                        <i class="bi bi-person"></i>
                        <span>Perfil</span>
                    </a>
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
            <span>Dashboard</span>
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

        @can('admin.posts.index')
        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.posts.index')}}">
            <i class="bi bi-grid"></i>
            <span>Cargos</span>
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

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Formularios</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a  href="#">
                        <i class="bi bi-circle"></i><span> Atleta-Infomação Geral</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="bi bi-circle"></i><span>Dados Biologicos</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="bi bi-circle"></i><span>Menstruação</span>
                        </a>
                    </li>
                </ul>
        </li>
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Tablas e Graficos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="tables-general.html">
                    <i class="bi bi-circle"></i><span>General</span>
                    </a>
                </li>
                <li>
                    <a href="tables-general.html">
                    <i class="bi bi-circle"></i><span>Individual</span>
                    </a>
                </li>
            </ul>
    </li>
    <li class="nav-heading">Paginas adicionales</li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
        <i class="bi bi-person"></i>
        <span>Perfil</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
        <i class="bi bi-envelope"></i>
        <span>Contatos</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
        <i class="bi bi-card-list"></i>
        <span>Cadastra-se</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" onclick="document.getElementById('cerrar').submit()" href="#">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Cerrar sesión</span>
        </a>
    </li>
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
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>

  <script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
  </script>
</body>
</html>