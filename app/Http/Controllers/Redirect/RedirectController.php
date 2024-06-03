<?php

namespace App\Http\Controllers\Redirect;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RedirectController extends Controller
{
    public function dashboard(){
        if (auth()->user()->can('admin.dashboard')){
            return redirect()->route('admin.dashboard');
        }elseif (auth()->user()->can('dashboard')){
            return redirect()->route('dashboard');
        }else{
            Auth::logout();
            return redirect()->route('login')->with('info', 'Você não tem as permissões necessárias para acessar o sistema. Por favor, entre em contato com a mesa de ajuda.');
        }
    }
}
