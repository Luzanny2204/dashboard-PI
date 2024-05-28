<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Positions\PositionsSeeder;
use Database\Seeders\Posts\PostsSeeder;
use Database\Seeders\Roles\RolesSeeder;
use Database\Seeders\States\StatesSeeder;
use Database\Seeders\Users\UsersSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(StatesSeeder::class);
        $this->call(PositionsSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);

    }
}
