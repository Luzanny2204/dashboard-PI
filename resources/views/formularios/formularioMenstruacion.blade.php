@extends('layouts.main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Formulario Atletas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Formulario</li>
          <li class="breadcrumb-item active">Formulario Dados do Ciclo Menstrual</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Formulario / Menstruação</h5>

              <!-- General Form Elements -->
              <form>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Ultimo periodo</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label" placeholder="Quantidade de dias">Duração</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Sintomas</label>
                        <div class="col-sm-10">
                            <input type="checkbox" class="btn-check" id="btn-check-1" autocomplete="off">
                            <label class="btn" for="btn-check-1">Dor de Cabeça</label>

                            <input type="checkbox" class="btn-check" id="btn-check-2" checked autocomplete="off">
                            <label class="btn" for="btn-check-2">Migranha</label>

                            <input type="checkbox" class="btn-check" id="btn-check-3" checked autocomplete="off">
                            <label class="btn" for="btn-check-3">Tontura</label>
                            
                            <input type="checkbox" class="btn-check" id="btn-check-4" checked autocomplete="off">
                            <label class="btn" for="btn-check-4">Acne</label>
                                                                    
                            <input type="checkbox" class="btn-check" id="btn-check-5" checked autocomplete="off">
                            <label class="btn" for="btn-check-5">Febre</label>

                            <input type="checkbox" class="btn-check" id="btn-check-6" autocomplete="off">
                            <label class="btn" for="btn-check-6">Calambres</label>

                            <input type="checkbox" class="btn-check" id="btn-check-7" checked autocomplete="off">
                            <label class="btn" for="btn-check-7">Calambres abdominales</label>

                            <input type="checkbox" class="btn-check" id="btn-check-8" checked autocomplete="off">
                            <label class="btn" for="btn-check-8">Dor nas costas</label>
                            
                            <input type="checkbox" class="btn-check" id="btn-check-9" checked autocomplete="off">
                            <label class="btn" for="btn-check-9">Fatiga</label>
                                                                    
                            <input type="checkbox" class="btn-check" id="btn-check-10" checked autocomplete="off">
                            <label class="btn" for="btn-check-10">Gases</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-11" checked autocomplete="off">
                            <label class="btn" for="btn-check-11">Hinchazon</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-12" checked autocomplete="off">
                            <label class="btn" for="btn-check-12">Antojos</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-13" checked autocomplete="off">
                            <label class="btn" for="btn-check-13">Aumento de peso</label>
                                                                    
                            <input type="checkbox" class="btn-check" id="btn-check-14" checked autocomplete="off">
                            <label class="btn" for="btn-check-14">Mudanzas do humor</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-15" checked autocomplete="off">
                            <label class="btn" for="btn-check-15">Comezon</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-16" checked autocomplete="off">
                            <label class="btn" for="btn-check-16">Confusão</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-17" checked autocomplete="off">
                            <label class="btn" for="btn-check-17">Dor no corpo</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-18" checked autocomplete="off">
                            <label class="btn" for="btn-check-18">Diarrea</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-19" checked autocomplete="off">
                            <label class="btn" for="btn-check-19">Erupciones</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-20" checked autocomplete="off">
                            <label class="btn" for="btn-check-20">Escalofrios</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-21" checked autocomplete="off">
                            <label class="btn" for="btn-check-21">Estrenhimento</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-22" checked autocomplete="off">
                            <label class="btn" for="btn-check-22">Estres</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-23" checked autocomplete="off">
                            <label class="btn" for="btn-check-23">Firmeza cervical</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-24" checked autocomplete="off">
                            <label class="btn" for="btn-check-24">Fome</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-25" checked autocomplete="off">
                            <label class="btn" for="btn-check-25">Incapacidade na concentração</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-26" checked autocomplete="off">
                            <label class="btn" for="btn-check-26">Insomnio</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-27" checked autocomplete="off">
                            <label class="btn" for="btn-check-27">Irritavilidade</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-28" checked autocomplete="off">
                            <label class="btn" for="btn-check-28">Nauseas</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-29" checked autocomplete="off">
                            <label class="btn" for="btn-check-29">Sofocos</label>
                                                                                                
                            <input type="checkbox" class="btn-check" id="btn-check-30" checked autocomplete="off">
                            <label class="btn" for="btn-check-30">Tensão</label>
                        </div>
                    </div>
                <div class="row mb-3">
                    <label for="coachSelect" class="col-sm-2 col-form-label">Fluxo cervical</label>
                    <div class="col-sm-10">
                        <select id="coachSelect" class="form-select">
                            <option selected>Selecione o tipo</option>
                            <option value="1">Seco</option>
                            <option value="2">Pegajoso</option>
                            <option value="3">Cremoso</option>
                            <option value="2">Aquoso</option>
                            <option value="3">Clara de ovo</option>
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
