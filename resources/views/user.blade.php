@extends('layouts.main')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Perfil</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Usuario</li>
            <li class="breadcrumb-item active">Perfil</li>
            </ol>
        </nav>
    </div>
    <section class="section profile">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                <h2>Kevin Anderson</h2>
                <h3>Deportista</h3>
                <div class="social-links mt-2">
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body pt-3">
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Visão Geral</button>
                        </li>
                        <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Cofigurações</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Sobre</h5>
                            <p class="small fst-italic"></p>
                            <h5 class="card-title">Detalhes do Perfil</h5>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Nome</div>
                                <div class="col-lg-9 col-md-8"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Cargo</div>
                                <div class="col-lg-9 col-md-8"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Telefone</div>
                                <div class="col-lg-9 col-md-8"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8"></div>
                            </div>
                        </div>
                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                        <!-- Profile Edit Form -->
                        <form>
                            <div class="row mb-3">
                                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Imagem de Perfil</label>
                                <div class="col-md-8 col-lg-9">
                                    <img src="assets/img/profile-img.jpg" alt="Profile">
                                    <div class="pt-2">
                                    <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nome</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="about" class="col-md-4 col-lg-3 col-form-label">Sobre</label>
                                <div class="col-md-8 col-lg-9">
                                    <textarea name="about" class="form-control" id="about" style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Job" class="col-md-4 col-lg-3 col-form-label">Comissão Tecnica</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="job" type="text" class="form-control" id="Job" value="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Country" class="col-md-4 col-lg-3 col-form-label">Pais</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="country" type="text" class="form-control" id="Country" value="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Telefone</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="phone" type="text" class="form-control" id="Phone" value="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="email" type="email" class="form-control" id="Email" value="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>