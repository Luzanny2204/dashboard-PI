<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioAtleta;
use App\Http\Controllers\FormularioDadosBiologicos;
use App\Http\Controllers\FormularioMenstruacion;
use App\Http\Controllers\FormularioFadiga;
use App\Http\Controllers\FormularioUsuario;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return view('welcome');});
Route::get('/formulario', [FormularioAtleta::class, 'index'])->name('formulario.atleta');//Ruta de Formulario de datos de los atletas
Route::get('/formularioDadosBiologicos', [FormularioDadosBiologicos::class, 'index'])->name('formulario.biologico');//Ruta de Formulario de dados Biologicos
Route::get('/formularioMenstruacion', [FormularioMenstruacion::class, 'index'])->name('formulario.mestruacion');//Ruta de Formulario de dados de la Menstruacion
Route::get('/formularioFadiga', [FormularioFadiga::class, 'index'])->name('formulario.fadiga');//Ruta de Formulario de dados Fadiga
Route::get('/usuario', [FormularioUsuario::class, 'index'])->name('usuario');//Perfiles