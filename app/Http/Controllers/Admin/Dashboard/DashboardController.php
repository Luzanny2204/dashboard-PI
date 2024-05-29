<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Team\Team;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        // Contar jugadores con el rol específico (ID 6)
        $countPlayers = User::whereHas('roles', function ($query) {
            $query->where('roles.id', 6);
        })->count();
        
        // Contar equipos (suponiendo que tienes un modelo Team)
        $countTeams = Team::count();
        
        // Obtener la cantidad de usuarios por cada rol excluyendo el rol con ID 6
        $userRoles = User::whereHas('roles', function ($query) {
            $query->where('roles.id', '!=', 6);
        })
        ->with('roles')
        ->get()
        ->groupBy('roles.*.name')
        ->map(function ($users, $role) {
            return count($users);
        });
        
        // Convertir los datos a un formato adecuado para el gráfico
        $rolesData = $userRoles->map(function ($count, $role) {
            return ['value' => $count, 'name' => $role];
        })->values()->toArray();
        
        // Contar usuarios con el rol específico (ID 6) por posición y obtener nombres de posiciones
        $playersByPosition = User::whereHas('roles', function ($query) {
            $query->where('roles.id', 6);
        })
        ->with('position')
        ->get()
        ->groupBy('position.name')
        ->map(function ($users, $position) {
            return count($users);
        });
    
        // Convertir los datos a un formato adecuado para el gráfico de ApexCharts
        $positionsData = $playersByPosition->map(function ($count, $position) {
            return ['x' => $position, 'y' => $count];
        })->values()->toArray();
        
        // Pasar datos a la vista
        return view('admin.dashboard.index', compact('countPlayers', 'countTeams', 'rolesData', 'positionsData'));
    }
    
    
}
