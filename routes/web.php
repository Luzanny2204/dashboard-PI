<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioAtleta;
use App\Http\Controllers\FormularioDadosBiologicos;
use App\Http\Controllers\FormularioMenstruacion;
use App\Http\Controllers\FormularioFadiga;
use App\Http\Controllers\FormularioUsuario;
use App\Http\Controllers\FormularioPSE;

//Rutas de formularios
Route::get('/', function () { return view('welcome');})->name('welcome');
Route::get('/formulario', [FormularioAtleta::class, 'index'])->name('formulario.atleta');//Ruta de Formulario de datos de los atletas
Route::get('/formularioDadosBiologicos', [FormularioDadosBiologicos::class, 'index'])->name('formulario.biologico');//Ruta de Formulario de dados Biologicos
Route::get('/formularioMenstruacion', [FormularioMenstruacion::class, 'index'])->name('formulario.mestruacion');//Ruta de Formulario de dados de la Menstruacion
Route::get('/formularioFadiga', [FormularioFadiga::class, 'index'])->name('formulario.fadiga');//Ruta de Formulario de dados Fadiga
Route::get('/formularioPSE', [FormularioPSE::class, 'index'])->name('formulario.pse');//Ruta de formularios de PSE


//Ruta de perfiles
Route::get('/usuario', [FormularioUsuario::class, 'index'])->name('usuario');//Perfiles admin (comissao tecnica)
