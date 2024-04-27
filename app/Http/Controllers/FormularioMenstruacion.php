<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioMenstruacion extends Controller
{
    public function index()
    {
        return view('formularios/formularioMenstruacion');
    }
}
