
@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        {{\Auth()->user()->name}}
        <br>
        {{\Auth()->user()->email}}
    </div>
</div>
<a class="dropdown-item dropdown-footer btn"  onclick="document.getElementById('cerrar').submit()">
                        <i class="fa fa-power-off" aria-hidden="true"></i> Cerrar Sesión
                    </a>
@endsection