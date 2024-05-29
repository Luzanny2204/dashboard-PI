<?php

namespace App\Http\Controllers\Admin\Positions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Positions\PositionsCreateRequest;
use App\Models\Position\Position;
use App\Models\State\State;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.positions.index')->only('index');
        $this->middleware('can:admin.positions.edit')->only('edit', 'update');
        $this->middleware('can:admin.positions.create')->only('create', 'store');
        $this->middleware('can:admin.positions.destroy')->only('destroy');
    }

    
    public function index()
    {
        $positions = Position::all();
        $states = State::all();
        return view('admin.positions.index',compact('positions','states'));

    }

 
    public function create()
    {
        
    }

 
    public function store(PositionsCreateRequest $request)
    {
        Position::create($request->all());
        return redirect()->route('admin.positions.index')->with('success', 'La posición se a creado correctamente.');
    }

  
    public function show(Position $position)
    {
        return view('admin.positions.index',compact('position'));
    }


    public function edit(Position $position)
    {
        return view('admin.positions.index',compact('position'));
    }

    
    public function update(PositionsCreateRequest $request, Position $position)
    {
        $position->update($request->all());
        return redirect()->route('admin.positions.index')->with('edit', 'La posión se a editado correctamente.');
    }

    
    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('admin.positions.index')->with('delete', 'La posición se a eliminado correctamente.');
    }
}
