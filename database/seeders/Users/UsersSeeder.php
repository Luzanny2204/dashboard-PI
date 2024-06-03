<?php

namespace Database\Seeders\Users;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=> 'Admin',
            'email'=> 'admin@gmail.com',
            'password'=> Hash::make('123'),
            'position_id'=> 1,
            'state_id'=> 1,
        ])->assignRole('Administrador');

        User::create([
            'name'=> 'Laura',
            'email'=> 'Laura@gmail.com',
            'password'=> Hash::make('123'),
            'position_id'=> null,
            'state_id'=> 1,
        ])->assignRole('Treinador');

        User::create([
            'name'=> 'santiago',
            'email'=> 'santiago@gmail.com',
            'password'=> Hash::make('123'),
            'position_id'=> null,
            'state_id'=> 1,
        ])->assignRole('Treinador');

        User::create([
            'name'=> 'lucia',
            'email'=> 'lucia@gmail.com',
            'password'=> Hash::make('123'),
            'position_id'=> null,
            'state_id'=> 1,
        ])->assignRole('Treinador');

        User::create([
            'name'=> 'Mateo',
            'email'=> 'mateo@gmail.com',
            'password'=> Hash::make('123'),
            'position_id'=> null,
            'state_id'=> 1,
        ])->assignRole('Nutricionista');

        User::create([
            'name'=> 'Jorge',
            'email'=> 'jorge@gmail.com',
            'password'=> Hash::make('123'),
            'position_id'=> null,
            'state_id'=> 1,
        ])->assignRole('Psicologos');

        User::create([
            'name'=> 'Jenni',
            'email'=> 'jenni@gmail.com',
            'password'=> Hash::make('123'),
            'position_id'=> null,
            'state_id'=> 1,
        ])->assignRole('Fisioterapeutas');

        User::create([
            'name'=> 'sofia',
            'email'=> 'sofia@gmail.com',
            'password'=> Hash::make('123'),
            'position_id'=> 1,
            'state_id'=> 1,
        ])->assignRole('Jogadoras');

        User::create([
            'name'=> 'jugador 1',
            'email'=> 'jugador1@gmail.com',
            'password'=> Hash::make('123'),
            'position_id'=> 2,
            'state_id'=> 1,
        ])->assignRole('Jogadoras');

        User::create([
            'name'=> 'jugador 2',
            'email'=> 'jugador2@gmail.com',
            'password'=> Hash::make('123'),
            'position_id'=> 1,
            'state_id'=> 1,
        ])->assignRole('Jogadoras');

        User::create([
            'name'=> 'jugador 3',
            'email'=> 'jugador3@gmail.com',
            'password'=> Hash::make('123'),
            'position_id'=> 2,
            'state_id'=> 1,
        ])->assignRole('Jogadoras');
    }
}
