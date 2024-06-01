<?php

namespace App\Http\Controllers\Admin\Physiotherapists;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Physiotherapists\PhysiotherapistsCreateRequest;
use App\Models\Physiotherapist\Physiotherapist;
use App\Models\User;
use Illuminate\Http\Request;

class PhysiotherapistsController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.physiotherapists.index')->only('index');
        $this->middleware('can:admin.physiotherapists.edit')->only('edit', 'update');
        $this->middleware('can:admin.physiotherapists.show')->only('show');
        $this->middleware('can:admin.physiotherapists.create')->only('create', 'store');
        $this->middleware('can:admin.physiotherapists.destroy')->only('destroy');
    }

    public function index()
    {
        $physiotherapists = Physiotherapist::all();
        return view('admin.physiotherapists.index',compact('physiotherapists'));
    }

    
    public function create()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('roles.id', 6);
        })->get();
        return view('admin.physiotherapists.create',compact('users'));
    }

    public function store(PhysiotherapistsCreateRequest $request)
    {
        Physiotherapist::create($request->all());
        return redirect()->route('admin.physiotherapists.index')->with('success', 'La fisioterapia se creo correctamente');
    }

   
    public function show(Physiotherapist $physiotherapist)
    {
        return view('admin.physiotherapists.show',compact('physiotherapist'));
    }

    
    public function edit(Physiotherapist $physiotherapist)
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('roles.id', 6);
        })->get();
        return view('admin.physiotherapists.edit',compact('physiotherapist','users'));
    }

    
    public function update(PhysiotherapistsCreateRequest $request, Physiotherapist $physiotherapist)
    {
        $physiotherapist->update($request->all());
        return redirect()->route('admin.physiotherapists.index')->with('edit', 'La fisioterapia se edito correctamente');
    }

   
    public function destroy(Physiotherapist $physiotherapist)
    {
        $physiotherapist->delete();
        return redirect()->route('admin.physiotherapists.index')->with('delete', 'La fisioterapia se elimino correctamente');
    }
}
