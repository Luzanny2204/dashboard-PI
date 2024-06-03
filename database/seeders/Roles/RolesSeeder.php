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
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Treinador']);
        $role3 = Role::create(['name' => 'Nutricionista']);
        $role4 = Role::create(['name' => 'Psicologos']);
        $role5 = Role::create(['name' => 'Fisioterapeutas']);
        $role6 = Role::create(['name' => 'Jogadoras']);

        //Permissão admin Dashboard
        Permission::create([
            'name' => 'admin.dashboard',
            'description'=> 'Ver painel administrativo (Admin)'
        ])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        //Permissão User Dashboard
        Permission::create([
            'name' => 'dashboard',
            'description'=> 'Ver painel administrativo dos jogadores'
        ])->syncRoles([$role1, $role6]);

        //Permissões admin Estados
        Permission::create([
            'name' => 'admin.states.index',
            'description'=> 'Lista de estados'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.states.create',
            'description'=> 'Criação de estados'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.states.edit',
            'description'=> 'Edição de estados'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.states.destroy',
            'description'=> 'Excluir estados'
        ])->syncRoles([$role1]);

        //Permissões admin roles
        Permission::create([
            'name' => 'admin.roles.index',
            'description'=> 'Lista de roles'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.create',
            'description'=> 'Criação de role'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.edit',
            'description'=> 'Edição de role'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.show',
            'description'=> 'Detalhe do role'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.destroy',
            'description'=> 'Excluir role'
        ])->syncRoles([$role1]);

        //Permissões admin positions
        Permission::create([
            'name' => 'admin.positions.index',
            'description'=> 'Lista de posições'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.positions.create',
            'description'=> 'Criação de posição'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.positions.edit',
            'description'=> 'Edição de posição'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.positions.show',
            'description'=> 'Detalhe da posição'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.positions.destroy',
            'description'=> 'Excluir posição'
        ])->syncRoles([$role1]);

        //Permissões admin teams
        Permission::create([
            'name' => 'admin.teams.index',
            'description'=> 'Lista de equipes'
        ])->syncRoles([$role1,$role2]);
        Permission::create([
            'name' => 'admin.teams.create',
            'description'=> 'Criação de equipe'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.teams.edit',
            'description'=> 'Edição de equipe'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.teams.show',
            'description'=> 'Detalhe da equipe'
        ])->syncRoles([$role1,$role2]);
        Permission::create([
            'name' => 'admin.teams.destroy',
            'description'=> 'Excluir equipe'
        ])->syncRoles([$role1]);

        //Permissões admin user
        Permission::create([
            'name' => 'admin.users.index',
            'description'=> 'Lista de usuários'
        ])->syncRoles([$role1, $role3, $role4]);
        Permission::create([
            'name' => 'admin.users.create',
            'description'=> 'Criação de usuário'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.users.edit',
            'description'=> 'Edição de usuário'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.users.show',
            'description'=> 'Detalhe do usuário'
        ])->syncRoles([$role1, $role3, $role4]);
        Permission::create([
            'name' => 'admin.users.destroy',
            'description'=> 'Excluir usuário'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.users.nutri',
            'description'=> 'Informação Nutricionista'
        ])->syncRoles([$role1, $role3]);
        Permission::create([
            'name' => 'admin.users.psico',
            'description'=> 'Informação Psicólogo'
        ])->syncRoles([$role1, $role4]);

        //Permissões admin databiologies
        Permission::create([
            'name' => 'admin.databiologies.index',
            'description'=> 'Lista de dados biológicos'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.databiologies.create',
            'description'=> 'Criação de dado biológico'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.databiologies.edit',
            'description'=> 'Edição de dado biológico'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.databiologies.show',
            'description'=> 'Detalhe do dado biológico'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.databiologies.destroy',
            'description'=> 'Excluir dado biológico'
        ])->syncRoles([$role1]);

        //Permissões admin menstrualcalendars
        Permission::create([
            'name' => 'admin.menstrualcalendars.index',
            'description'=> 'Lista de calendários menstruais'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.menstrualcalendars.create',
            'description'=> 'Criação de calendário menstrual'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.menstrualcalendars.edit',
            'description'=> 'Edição de calendário menstrual'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.menstrualcalendars.show',
            'description'=> 'Detalhe do calendário menstrual'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.menstrualcalendars.destroy',
            'description'=> 'Excluir calendário menstrual'
        ])->syncRoles([$role1]);

        //Permissões nutricionista
        Permission::create([
            'name' => 'admin.nutritionists.edit',
            'description'=> 'Editar informação Nutricionista'
        ])->syncRoles([$role1, $role3]);
        Permission::create([
            'name' => 'admin.psicologies.edit',
            'description'=> 'Editar informação Psicólogo'
        ])->syncRoles([$role1, $role4]);

        //Permissões admin physiotherapists
        Permission::create([
            'name' => 'admin.physiotherapists.index',
            'description'=> 'Lista de fisioterapias'
        ])->syncRoles([$role1, $role5]);
        Permission::create([
            'name' => 'admin.physiotherapists.create',
            'description'=> 'Criação de fisioterapia'
        ])->syncRoles([$role1, $role5]);
        Permission::create([
            'name' => 'admin.physiotherapists.edit',
            'description'=> 'Edição de fisioterapia'
        ])->syncRoles([$role1, $role5]);
        Permission::create([
            'name' => 'admin.physiotherapists.show',
            'description'=> 'Detalhe da fisioterapia'
        ])->syncRoles([$role1, $role5]);
        Permission::create([
            'name' => 'admin.physiotherapists.destroy',
            'description'=> 'Excluir fisioterapia'
        ])->syncRoles([$role1, $role5]);
    }
}
