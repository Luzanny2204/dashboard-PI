<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioAtleta extends Controller
{
    public function index()
    {
        return view('formularios/formularioAtleta');
    }
}
