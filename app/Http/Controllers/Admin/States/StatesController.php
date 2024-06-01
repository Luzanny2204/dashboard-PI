<?php

namespace App\Http\Controllers\Admin\States;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\States\StatesCreateRequest;
use App\Models\State\State;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class StatesController extends Controller
{

    public function __construct(){
        $this->middleware('can:admin.states.index')->only('index');
        $this->middleware('can:admin.states.edit')->only('edit', 'update');
        $this->middleware('can:admin.states.create')->only('create', 'store');
        $this->middleware('can:admin.states.destroy')->only('destroy');
    }

    
    public function index()
    {
        $states = State::all();
        return view('admin.states.index',compact('states'));

    }

 
    public function create()
    {
        
    }

 
    public function store(StatesCreateRequest $request)
    {
        State::create($request->all());
        return redirect()->route('admin.states.index')->with('success', 'El estado se a creado correctamente.');
    }

  
    public function show(State $state)
    {
        return view('admin.states.index',compact('state'));
    }


    public function edit(State $state)
    {
        return view('admin.states.index',compact('state'));
    }

    
    public function update(StatesCreateRequest $request, State $state)
    {
        $state->update($request->all());
        return redirect()->route('admin.states.index')->with('edit', 'El estado se a editado correctamente.');
    }

    
    public function destroy(State $state)
    {
        try {
            $state->delete();
            return redirect()->route('admin.states.index')->with('delete', 'El estado se a eliminado correctamente.');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) { 
                return redirect()->route('admin.states.index')->with('info', 'No es posible eliminar el estado porque está asociada a uno o más registros.');
            }
            return redirect()->route('admin.states.index')->with('info', 'Ocurrió un error al intentar eliminar el estado.');
        }
    }
}
