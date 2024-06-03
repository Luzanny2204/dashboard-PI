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
        return redirect()->route('admin.states.index')->with('success', 'O estado foi criado com sucesso');
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
        return redirect()->route('admin.states.index')->with('edit', 'O estado foi editado com sucesso');
    }

    
    public function destroy(State $state)
    {
        try {
            $state->delete();
            return redirect()->route('admin.states.index')->with('delete', 'O estado foi deletado com sucesso');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) { 
                return redirect()->route('admin.states.index')->with('info', 'Não é possível excluir o estado porque está associado a um ou mais registros.');
            }
            return redirect()->route('admin.states.index')->with('info', 'Ocorreu um erro ao tentar excluir o estado.');
        }
    }
}
