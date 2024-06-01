<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\DataBiology\Databiology;
use App\Models\MenstrualCalendar\Menstrualcalendar;
use App\Models\Nutritionist\nutritionist;
use App\Models\Position\Position;
use App\Models\Psicology\Psicology;
use App\Models\State\State;
use App\Models\Team\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\View;


class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
        $this->middleware('can:admin.users.show')->only('show');
        $this->middleware('can:admin.users.create')->only('create', 'store');
        $this->middleware('can:admin.users.destroy')->only('destroy');
    }
    public function index()
    {
        $userAdmins = User::whereHas('roles', function ($query) {
            $query->where('roles.id', 1);
        })->get();

        $userTechnicalTrainer = User::whereHas('roles', function ($query) {
            $query->where('roles.id', 2);
        })->get();

        $userNutritionists = User::whereHas('roles', function ($query) {
            $query->where('roles.id', 3);
        })->get();

        $userPsychologies = User::whereHas('roles', function ($query) {
            $query->where('roles.id', 4);
        })->get();

        $userPhysiotherapists = User::whereHas('roles', function ($query) {
            $query->where('roles.id', 5);
        })->get();

        $userPlayers = User::whereHas('roles', function ($query) {
            $query->where('roles.id', 6);
        })->get();

        return view('admin.users.index', compact('userAdmins','userTechnicalTrainer','userNutritionists','userPsychologies','userPhysiotherapists','userPlayers'));
    }

    public function create()
    {
        $users = User::all();
        $states = State::all();
        $roles = Role::all();
        $positions = Position::all();
        $teams = Team::all();

        return view('admin.users.create', compact('users', 'states', 'roles','positions','teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => 'required',
            'weight' => 'nullable',
            'height' => 'nullable',
            'phone' => 'nullable', 
            'team' => 'nullable', 
            'position_id' => 'nullable',
            'state_id' => 'required',
            'roles' => ['required', 'array', 'min:1'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'weight' => $request->weight,
            'height' => $request->height,
            'phone' => $request->phone,
            'position_id' => $request->position_id,
            'state_id' => $request->state_id,
        ]);

        $user->roles()->sync($request->roles);

        if ($request->has('team') && is_array($request->team)) {
            $filteredTeams = array_filter($request->team, function($teamId) {
                return !is_null($teamId) && $teamId !== '';
            });

            if (!empty($filteredTeams)) {
                $teamData = [];
                foreach ($filteredTeams as $teamId) {
                    $teamData[$teamId] = ['created_at' => now(), 'updated_at' => now()];
                }
                $user->teams()->sync($teamData);
            }
        }

        return redirect()->route('admin.users.index')->with('success', 'El Usuario se ha creado correctamente.');
    }

    
    public function show(User $user)
    {
        $getDataBiologies = Databiology::where('user_id',$user->id)->get();
        $getMenstrualCalendars = Menstrualcalendar::where('user_id',$user->id)->get();
        $getNutritionists =  nutritionist::where('user_id', $user->id)->get();
        $getPsicologies =  Psicology::where('user_id', $user->id)->get();
        return view('admin.users.show', compact('user','getDataBiologies','getMenstrualCalendars','getNutritionists','getPsicologies'));
    }

    public function edit(User $user)
    {
        $states = State::all();
        $roles = Role::all();
        $positions = Position::all();
        $teams = Team::all();
        $userTeams = $user->teams->pluck('id')->toArray();

        return view('admin.users.edit', compact('user', 'states', 'roles', 'positions', 'teams', 'userTeams'));
    }



    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable',
            'weight' => 'nullable',
            'height' => 'nullable',
            'phone' => 'nullable', 
            'team' => 'nullable|array', 
            'position_id' => 'nullable',
            'state_id' => 'required',
            'roles' => ['required', 'array', 'min:1'],
        ]);
    
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'weight' => $request->weight,
            'height' => $request->height,
            'phone' => $request->phone,
            'position_id' => $request->position_id,
            'state_id' => $request->state_id,
        ]);
    
        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }
    
        $user->roles()->sync($request->roles);
    

        if ($request->has('team') && is_array($request->team)) {
            $filteredTeams = array_filter($request->team, function($teamId) {
                return !is_null($teamId) && $teamId !== '';
            });

            if (!empty($filteredTeams)) {
                $teamData = [];
                foreach ($filteredTeams as $teamId) {
                    $teamData[$teamId] = ['created_at' => now(), 'updated_at' => now()];
                }
                $user->teams()->sync($teamData);
            }
            else {
                $user->teams()->detach();
            }
        }
    
        return redirect()->route('admin.users.index')->with('success', 'El Usuario se ha actualizado correctamente.');
    }
    

    public function destroy(User $user)
    {
        if ($user->id === 1) {
            return redirect()->route('admin.users.index')->with('info', 'Este usuario no se puede eliminar ya que es uno de los principales en el sistema');
        }
    
        try {
            $user->roles()->detach();
            $user->teams()->detach();
            $user->delete();
            return redirect()->route('admin.users.index')->with('delete', 'El Usuario se ha eliminado correctamente.');
        } catch (QueryException $e) {
            return redirect()->route('admin.users.index')->with('error', 'No se pudo eliminar el usuario debido a restricciones de integridad referencial.');
        }
    }
    
}
