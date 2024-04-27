<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioDadosBiologicos extends Controller
{
    public function index()
    {
        return view('formularios/formularioDadosBiologicos');
    }
}
