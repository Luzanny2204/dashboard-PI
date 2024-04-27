<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioFadiga extends Controller
{
    public function index()
    {
        return view('formularios/formularioFadiga');
    }
}
