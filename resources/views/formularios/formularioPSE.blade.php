@extends('layouts.main')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Formulario PSE</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Formulario</li>
          <li class="breadcrumb-item active">Formulario de PSE</li>
        </ol>
      </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulario de PSE</h5>
                        <form>
                            <form>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Data de Registro PSE:</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Pontuação PSE:</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>