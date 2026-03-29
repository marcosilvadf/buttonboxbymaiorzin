<?php

namespace Database\Seeders;

use App\Models\GameMod;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GameModSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            'Euro Truck Simulator 2',
            'American Truck Simulator'
        ];

        foreach ($games as $game) {            
            GameMod::firstOrCreate(['name' => $game, 'slug' => Str::slug($game)]);
        }
    }
}
