@extends('layouts.main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Formulario Atletas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Formulario</li>
          <li class="breadcrumb-item active">Formulario de Fadiga</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulario de Fadiga</h5>

              <!-- General Form Elements -->
              <form>
              <form>
                <!-- Variabilidade da Frequência Cardíaca (VFC) -->
                <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Variabilidade da Frequência Cardíaca (VFC):</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control">
                    </div>
                </div>
                <!-- Frequência Cardíaca em Repouso (FCR) -->
                <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Frequência Cardíaca em Repouso (FCR):</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control">
                    </div>
                </div>
                <!-- Sono -->
                    <div class="row mb-3">
                        <label for="sonoSelect" class="col-sm-2 col-form-label">Sono:</label>
                        <div class="col-sm-10">
                            <select id="sonoSelect" class="form-select">
                                <option selected>Niveis</option>
                                <option value="1">Excelente</option>
                                <option value="2">Bom</option>
                                <option value="3">Regular</option>
                                <option value="4">Ruim</option>
                                <option value="5">Muito Ruim</option>
                            </select>
                        </div>
                    </div>
                </form>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->