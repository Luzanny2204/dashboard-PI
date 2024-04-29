<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioPSE extends Controller
{
    public function index()
    {
        return view('formularios/formularioPSE');
    }
}
