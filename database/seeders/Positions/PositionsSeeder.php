<?php

namespace Database\Seeders\Positions;

use App\Models\Position\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::create([
            'name' =>  'Delantero',
            'state_id' =>  1,
        ]);

        Position::create([
            'name' =>  'Bolante',
            'state_id' =>  2,
        ]);
    }
}
