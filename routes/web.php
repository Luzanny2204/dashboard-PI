<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioAtleta;
use App\Http\Controllers\FormularioDadosBiologicos;
use App\Http\Controllers\FormularioMenstruacion;
use App\Http\Controllers\FormularioFadiga;
use App\Http\Controllers\FormularioUsuario;
use App\Http\Controllers\FormularioPSE;
use App\Http\Controllers\Redirect\RedirectController;

Route::get('/redirect',[RedirectController::class, 'dashboard']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','can:dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Rutas de formularios
Route::get('/', function () { return view('welcome');})->name('welcome');

//Rutas do CRUD do formulario de atletas

require __DIR__.'/auth.php';
