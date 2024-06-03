
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Performance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{url('users/css/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{url('users/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{url('users/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{url('users/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{url('users/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{url('users/css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{url('users/css/jquery.fancybox.min.css')}}">

  <link rel="stylesheet" href="{{url('users/css/bootstrap-datepicker.css')}}">

  <link rel="stylesheet" href="{{url('users/fonts/flaticon.css')}}">

  <link rel="stylesheet" href="{{url('users/css/aos.css')}}">

  <link rel="stylesheet" href="{{url('users/css/style.css')}}">



</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="index.html">
              <img src="assets/img/logo.png" alt="Performance Max">
            </a>
          </div>
          <div class="ml-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              @if(\Auth::user())
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="{{route('admin.dashboard')}}" class="nav-link">Panel administrativo</a></li>
              </ul>
              @else
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="/" class="nav-link">Inicio</a></li>
                <li><a href="{{route('login')}}" class="nav-link">Login</a></li>
                <li><a href="{{route('register')}}" class="nav-link">Cadastre-se</a></li>
              </ul>
              @endif
            </nav>

            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white"><span
                class="icon-menu h3 text-white"></span></a>
          </div>
        </div>
      </div>

    </header>

    <div class="hero overlay" style="background-image: url('https://www.idrd.gov.co/sites/default/files/2022-10/torneo_de_las_mujeres_0.jpeg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 ml-auto">
            <h1 class="text-white">Performance Max</h1>
            <p>Potencie o desempenho de suas atletas</p>
            <p>
            <a href="#" class="btn btn-custom py-3 px-4 mr-3 more light">Login</a>

              <a href="#" class="more light">Mais informaçaõ</a>
            </p>  
          </div>
        </div>
      </div>
    </div>

  

    <div class="latest-news">
  <div class="container">
    <div class="row">
      <div class="col-12 title-section">
        <h2 class="heading">Latest News</h2>
      </div>
    </div>
    <div class="row no-gutters">
      <div class="col-md-4">
        <div class="post-entry">
          <a href="#">
            <img src="https://images.ecestaticos.com/imdSf14Q05eCft3s3T1KhhxzgX4=/0x0:2272x1515/1200x900/filters:fill(white):format(jpg)/f.elconfidencial.com%2Foriginal%2Ff95%2F5b7%2F152%2Ff955b7152a5163eadd8fa369b0c496c6.jpg" alt="Image" class="img-fluid">
          </a>
          <div class="caption">
            <div class="caption-inner">
              <div class="author d-flex align-items-center">
                <div class="img mb-2 mr-3">
                </div>
                <div class="text">
                  <h4>Mellissa Allison</h4>
                  <span>May 19, 2024 &bullet; Sports</span>
                </div>
              </div>
            </div>
          </div> 
        </div>
      </div>
      <div class="col-md-4">
        <div class="post-entry">
          <a href="#">
            <img src="https://st5.depositphotos.com/8132070/62537/i/450/depositphotos_625379386-stock-photo-germany-cologne-nowember-2022-match.jpg" alt="Image" class="img-fluid">
          </a>
          <div class="caption">
            <div class="caption-inner">
              <div class="author d-flex align-items-center">
                <div class="img mb-2 mr-3">
                  <img src="images/person_1.jpg" alt="">
                </div>
                <div class="text">
                  <h4>Camila Tonsomp</h4>
                  <span>May 20, 2024 &bullet; Sports</span>
                </div>
              </div>
            </div>
          </div> 
        </div>
      </div>
      <div class="col-md-4">
        <div class="post-entry">
          <a href="#">
            <img src="https://tvazteca.brightspotcdn.com/91/b9/d950c41e483fbf8f15974dbad848/nicki-hernandez-con-la-seleccion-mexicana-femenil.jpg" alt="Image" class="img-fluid">
          </a>
          <div class="caption">
            <div class="caption-inner">
              <div class="author d-flex align-items-center">
                <div class="img mb-2 mr-3">
                  <img src="images/person_1.jpg" alt="">
                </div>
                <div class="text">
                  <h4>Analy Ramirez</h4>
                  <span>May 19, 2020 &bullet; Sports</span>
                </div>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section" style="background-color: #ee1e46; padding: 180px;">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="message-heading">Impulse a eficiência do seu trabalho com soluções inteligentes</h1>
      </div>
    </div>
  </div>
</div>
<div class="container site-section">
  <div class="row">
    <div class="col-6 title-section">
      <h2 class="heading">Nosso Blog</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="custom-media d-flex">
        <div class="img mr-4">
          <img src="https://fcf.com.co/wp-content/uploads/2024/02/Comision-tecnica-scaled.jpg" alt="Image" class="img-fluid">
        </div>
        <div class="text">
          <span class="meta">20 de Maio de 2024
          </span>
          <h3 class="mb-4"><a href="#">Monitoramento de Desempenho</a></h3>
          <p>Os dados coletados durante os treinos e partidas permitem um monitoramento preciso do desempenho de cada jogadora. Parâmetros como a velocidade, distância percorrida, frequência cardíaca e níveis de fadiga são medidos e analisados em tempo real. Isso ajuda os treinadores a ajustar as cargas de trabalho, prevenindo lesões e melhorando a eficiência dos treinos.</p>
          <p><a href="#">Leia mais</a></p>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="custom-media d-flex">
        <div class="img mr-4">
          <img src="https://phantom-elmundo.unidadeditorial.es/be17b59e907ff7e6a7eab8caf444c498/resize/1200/f/jpg/assets/multimedia/imagenes/2023/09/21/16952861253879.jpg" alt="Image" class="img-fluid">
        </div>
        <div class="text">
          <span class="meta">24 de Maio de 2024</span>
          <h3 class="mb-4"><a href="#">Importancia dos dados</a></h3>
          <p>No mundo do futebol moderno, a tecnologia e os dados têm se tornado aliados indispensáveis para treinadores e jogadores. Com o advento de novas 
            ferramentas de análise, a coleta e interpretação de dados são essenciais para otimizar o desempenho e criar estratégias eficazes. Mas como esses 
            dados impactam o treinamento das jogadoras de futebol?</p>
          <p><a href="#">Leia mais</a></p>
        </div>
      </div>
    </div>
  </div>
</div>



<footer class="footer-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="widget mb-3">
          <h3>Notícias</h3>
          <ul class="list-unstyled links">
            <li><a href="#">Todas</a></li>
            <li><a href="#">Notícias do Clube</a></li>
            <li><a href="#">Centro de Mídia</a></li>
            <li><a href="#">Vídeo</a></li>
            <li><a href="#">RSS</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="widget mb-3">
          <h3>Ingressos</h3>
          <ul class="list-unstyled links">
            <li><a href="#">Ingresso Online</a></li>
            <li><a href="#">Pagamento e Preços</a></li>
            <li><a href="#">Contato &amp; Reservas</a></li>
            <li><a href="#">Ingressos</a></li>
            <li><a href="#">Cupom</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="widget mb-3">
          <h3>Partidas</h3>
          <ul class="list-unstyled links">
            <li><a href="#">Classificação</a></li>
            <li><a href="#">Copa do Mundo</a></li>
            <li><a href="#">Campeonato Brasileiro</a></li>
            <li><a href="#">Copa Libertadores</a></li>
            <li><a href="#">Liga Mundial</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="widget mb-3">
          <h3>Social</h3>
          <ul class="list-unstyled links">
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Instagram</a></li>
            <li><a href="#">YouTube</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="row text-center">
  <div class="col-md-12">
    <div class=" pt-5">
      <p>
        Copyright &copy;
        <script>
          document.write(new Date().getFullYear());
        </script> Todos os direitos reservados <i class="icon-heart"
            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Performan Max</a>
      </p>
    </div>
  </div>
</div>
</div>
    
</footer>
  </div>
  <!-- .site-wrap -->

  <script src="{{url('users/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{url('users/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{url('users/js/jquery-ui.js')}}"></script>
  <script src="{{url('users/js/popper.min.js')}}"></script>
  <script src="{{url('users/js/bootstrap.min.js')}}"></script>
  <script src="{{url('users/js/owl.carousel.min.js')}}"></script>
  <script src="{{url('users/js/jquery.stellar.min.js')}}"></script>
  <script src="{{url('users/js/jquery.countdown.min.js')}}"></script>
  <script src="{{url('users/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{url('users/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{url('users/js/aos.js')}}"></script>
  <script src="{{url('users/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{url('users/js/jquery.sticky.js')}}"></script>
  <script src="{{url('users/js/jquery.mb.YTPlayer.min.js')}}"></script>


  <script src="{{url('users/js/main.js')}}"></script>

</body>

</html>