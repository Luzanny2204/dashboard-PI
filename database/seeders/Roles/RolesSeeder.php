<?php

namespace Database\Seeders\Roles;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Entrenador tecnico']);
        $role3 = Role::create(['name' => 'Nutrisionista']);
        $role4 = Role::create(['name' => 'Psicologos']);
        $role5 = Role::create(['name' => 'Fisioterapeutas']);
        $role6 = Role::create(['name' => 'Jugadores']);


        //Permiso admin Dashboard
        Permission::create([
            'name' => 'admin.dashboard',
            'description'=> 'Ver panel administrativo ( Admin )'
        ])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        //Permiso User Dashboard
        Permission::create([
            'name' => 'dashboard',
            'description'=> 'Ver panel administrativo de los jugadores'
        ])->syncRoles([$role1, $role6]);

        

         //Permisos admin Estados
         Permission::create([
            'name' => 'admin.states.index',
            'description'=> 'Lista de estados '
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.states.create',
            'description'=> 'Creación de estados'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.states.edit',
            'description'=> 'Edición de estados'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.states.destroy',
            'description'=> 'Eliminar estados'
        ])->syncRoles([$role1]);

        //Permisos admin roles
        Permission::create([
            'name' => 'admin.roles.index',
            'description'=> 'Listado de roles'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.create',
            'description'=> 'Creación del rol'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.edit',
            'description'=> 'Edición del rol'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.show',
            'description'=> 'Detalle del rol'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.destroy',
            'description'=> 'Eliminación del rol'
        ])->syncRoles([$role1]);



         //Permisos admin positions
         Permission::create([
            'name' => 'admin.positions.index',
            'description'=> 'Listado de posiciones'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.positions.create',
            'description'=> 'Creación de la posicion'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.positions.edit',
            'description'=> 'Edición de la posicion'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.positions.show',
            'description'=> 'Detalle de la posicion'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.positions.destroy',
            'description'=> 'Eliminación de la posicion'
        ])->syncRoles([$role1]);

         //Permisos admin teams
         Permission::create([
            'name' => 'admin.teams.index',
            'description'=> 'Listado de los Equipos'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.teams.create',
            'description'=> 'Creación del equipo'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.teams.edit',
            'description'=> 'Edición del equipo'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.teams.show',
            'description'=> 'Detalle del equipo'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.teams.destroy',
            'description'=> 'Eliminación del equipo'
        ])->syncRoles([$role1]);


         //Permisos admin user
         Permission::create([
            'name' => 'admin.users.index',
            'description'=> 'Listado de los usuarios'
        ])->syncRoles([$role1,$role3,$role4]);
        Permission::create([
            'name' => 'admin.users.create',
            'description'=> 'Creación del usuario'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.users.edit',
            'description'=> 'Edición del usuario'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.users.show',
            'description'=> 'Detalle del usuario'
        ])->syncRoles([$role1,$role3,$role4]);
        Permission::create([
            'name' => 'admin.users.destroy',
            'description'=> 'Eliminación del usuario'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.users.nutri',
            'description'=> 'Informacion Nutricionista'
        ])->syncRoles([$role1,$role3]);
        Permission::create([
            'name' => 'admin.users.psico',
            'description'=> 'Informacion Psicologo'
        ])->syncRoles([$role1,$role4]);


         //Permisos admin databiologies
         Permission::create([
            'name' => 'admin.databiologies.index',
            'description'=> 'Listado de datos biológicos'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.databiologies.create',
            'description'=> 'Creación del dato biológico'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.databiologies.edit',
            'description'=> 'Edición del dato biológico'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.databiologies.show',
            'description'=> 'Detalle del dato biológico'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.databiologies.destroy',
            'description'=> 'Eliminación del dato biológico'
        ])->syncRoles([$role1]);


         //Permisos admin menstrualcalendars
         Permission::create([
            'name' => 'admin.menstrualcalendars.index',
            'description'=> 'Listado de los calendarios menstruales'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.menstrualcalendars.create',
            'description'=> 'Creación del calendario menstrual'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.menstrualcalendars.edit',
            'description'=> 'Edición del calendario menstrual'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.menstrualcalendars.show',
            'description'=> 'Detalle del calendario menstrual'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.menstrualcalendars.destroy',
            'description'=> 'Eliminación del calendario menstrual'
        ])->syncRoles([$role1]);

        //Permisos nutricionista

        Permission::create([
            'name' => 'admin.nutritionists.edit',
            'description'=> 'Editar informacion Nutricion'
        ])->syncRoles([$role1,$role3]);
        Permission::create([
            'name' => 'admin.psicologies.edit',
            'description'=> 'Editar informacion Psicologo'
        ])->syncRoles([$role1]);
    }
}
