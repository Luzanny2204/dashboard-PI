<?php

namespace Database\Seeders\Posts;

use App\Models\Post\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'name' => 'Director Técnico'
        ]);
    }
}
