@extends('layouts.main')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Formulario Atletas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Formulario</li>
          <li class="breadcrumb-item active">Formulario Dados-Atletas</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Formulario Atletas</h5>

              <!-- General Form Elements -->
              <form>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nome</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Data de Nascimento</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Peso</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Altura</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="coachSelect" class="col-sm-2 col-form-label">Posição</label>
                    <div class="col-sm-10">
                        <select id="coachSelect" class="form-select">
                            <option value="1">Posição 1</option>
                            <option value="2">Posição 2</option>
                            <option value="3">Posição 3</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="coachSelect" class="col-sm-2 col-form-label">Equipe</label>
                    <div class="col-sm-10">
                        <select id="coachSelect" class="form-select">
                            <option value="1">Equipe 1</option>
                            <option value="2">Equipe 2</option>
                            <option value="3">Equipe 3</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="coachSelect" class="col-sm-2 col-form-label">Coach</label>
                    <div class="col-sm-10">
                        <select id="coachSelect" class="form-select">
                            <option value="1">Coach 1</option>
                            <option value="2">Coach 2</option>
                            <option value="3">Coach 3</option>
                        </select>
                    </div>
                </div>
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
