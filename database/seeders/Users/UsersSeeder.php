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
            'post_id'=> 1,
        ])->assignRole('Admin');
    }
}
