<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Performance</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <main>
    <div class="container">

      <!-- Registration Section -->
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Performance Max</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Criar uma Conta</h5>
                    <p class="text-center small">Digite seus detalhes pessoais para criar uma conta</p>
                  </div><!-- Registration Form -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="col-12">
                            <label for="yourName" class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control" id="yourName" required>
                        </div>

                        <div class="col-12">
                            <label for="yourEmail" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="yourEmail" required>
                        </div>

                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Senha</label>
                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                        </div>


                        <div class="col-12">
                            <label for="weight" class="form-label">weight</label>
                            <input type="text" name="weight" class="form-control" id="weight" required>
                        </div>

                        <div class="col-12">
                            <label for="height" class="form-label">height</label>
                            <input type="text" name="height" class="form-control" id="height" required>
                        </div>

                        <div class="col-12">
                            <label for="phone" class="form-label">phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" required>
                        </div>

                        <div class="col-12">
                            <label for="position_id" class="form-label">Position</label>
                            <select name="position_id" class="form-select" id="position_id" required>
                                <option value="" disabled selected>Selecione seu posicion</option>
                                @foreach($positions as $position)
                                  <option value="{{$position->id}}">{{$position->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 mt-4">
                            <button class="btn btn-primary w-100" type="submit">Crie sua conta</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Registration Section -->

    </div>
  </main>

  <!-- Back to Top Button -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
