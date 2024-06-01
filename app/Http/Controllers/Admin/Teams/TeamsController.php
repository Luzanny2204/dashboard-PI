<?php

namespace App\Http\Controllers\Admin\Teams;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Teams\TeamsCreateRequest;
use App\Models\State\State;
use App\Models\Team\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class TeamsController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.teams.index')->only('index');
        $this->middleware('can:admin.teams.edit')->only('edit', 'update');
        $this->middleware('can:admin.teams.show')->only('show');
        $this->middleware('can:admin.teams.create')->only('create', 'store');
        $this->middleware('can:admin.teams.destroy')->only('destroy');
    }

    
    public function index()
    {
        $teams = Team::all();
        $states = State::all();
        return view('admin.teams.index',compact('teams','states'));
    }

 
    public function create()
    {
        $teams = Team::all();
        $states = State::all();
        //Traemos los usuarios con rol jugador
        $users =User::doesntHave('teams')
        ->whereHas('roles', function ($query) {
            $query->where('roles.id', 6);
        })
        ->get();
        //Traemos los usuarios con rol Entrenador técnico
        $usersTecTrainers =User::doesntHave('teams')
        ->whereHas('roles', function ($query) {
            $query->where('roles.id', 2);
        })
        ->get();
        
        return view('admin.teams.create',compact('teams','states','users','usersTecTrainers'));
    }

 
    public function store(TeamsCreateRequest $request)
    {
        $team = Team::create($request->all());
        if($request->users){
            $userData = [];
            foreach ($request->users as $userId) {
                $userData[$userId] = ['created_at' => now(), 'updated_at' => now()];
            }
            $team->users()->sync($userData);
        }
        return redirect()->route('admin.teams.index')->with('success', 'El equipo se a creado correctamente.');
    }

  
    public function show(Team $team)
    {
        return view('admin.teams.show',compact('team'));
    }


    public function edit(Team $team)
    {
        $states = State::all();
        $users = User::where(function ($query) use ($team) {
            $query->doesntHave('teams')
                ->orWhereHas('teams', function ($q) use ($team) {
                    $q->where('teams.id', $team->id);
                });
        })
        ->whereHas('roles', function ($query) {
            $query->where('roles.id', 6);
        })
        ->get();

        $usersTecTrainers = User::where(function ($query) use ($team) {
            $query->doesntHave('teams')
                ->orWhereHas('teams', function ($q) use ($team) {
                    $q->where('teams.id', $team->id);
                });
        })
        ->whereHas('roles', function ($query) {
            $query->where('roles.id', 2);
        })
        ->get();
    
        return view('admin.teams.edit', compact('team', 'states', 'users','usersTecTrainers'));
    }

    
    public function update(TeamsCreateRequest $request, Team $team)
    {
        try {
            $team->update($request->all());
        
            if ($request->users) {
                $userData = [];
                foreach ($request->users as $userId) {
                    $userData[$userId] = ['created_at' => now(), 'updated_at' => now()];
                }
                $team->users()->sync($userData);
            }else{
                $team->users()->detach();
            }
        
            return redirect()->route('admin.teams.index')->with('success', 'El equipo se ha actualizado correctamente.');
        } catch (QueryException $e) {
            return $e;
        }
    }

    
    public function destroy(Team $team)
    {
        $team->users()->detach();
        $team->delete();
        return redirect()->route('admin.teams.index')->with('delete', 'El equipo se a eliminado correctamente.');
    }
}
