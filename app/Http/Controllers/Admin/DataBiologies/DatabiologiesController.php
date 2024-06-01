<?php

namespace App\Http\Controllers\Admin\DataBiologies;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DataBiologies\DatabiologiesCreateRequest;
use App\Models\DataBiology\Databiology;
use App\Models\User;
use Illuminate\Http\Request;

class DatabiologiesController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.databiologies.index')->only('index');
        $this->middleware('can:admin.databiologies.edit')->only('edit', 'update');
        $this->middleware('can:admin.databiologies.create')->only('create', 'store');
        $this->middleware('can:admin.databiologies.destroy')->only('destroy');
    }
 
    public function index()
    {
        $databiologies = Databiology::all();
        return view('admin.databiologies.index',compact('databiologies'));
    }


    public function create()
    {
        $users = User::all();
        return view('admin.databiologies.create',compact('users'));
    }


    public function store(DatabiologiesCreateRequest $request)
    {
        $existingDatabiology = Databiology::where('user_id', $request->user_id)->first();

        if ($existingDatabiology) {
            return redirect()->route('admin.databiologies.index')->with('info', 'No es posible crear la información biológica porque ya existe un registro para este usuario.');
        }
    
        Databiology::create($request->all());

        return redirect()->route('admin.databiologies.index')->with('success', 'El dato biológico se a creado correctamente.');
    }


    public function show(Databiology $databiology)
    {
        return view('admin.databiologies.show',compact('databiology'));
    }

    public function edit(Databiology $databiology)
    {
        $users = User::all();
        return view('admin.databiologies.edit',compact('databiology','users'));
    }

    public function update(DatabiologiesCreateRequest $request, Databiology $databiology)
    {
        $databiology->update($request->all());
        return redirect()->route('admin.databiologies.index')->with('edit', 'El dato biológico se a editado correctamente.');
    }

    public function destroy(Databiology $databiology)
    {
        $databiology->delete();
        return redirect()->route('admin.databiologies.index')->with('delete', 'El dato biológico se a eliminado correctamente.');
    }
}
