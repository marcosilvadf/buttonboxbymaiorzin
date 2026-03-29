<?php

namespace Database\Seeders;

use App\Models\GameVersionMod;
use Illuminate\Database\Seeder;

class GameVersionModSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $versions = [
            'Todas as versões',
            '1.58',
            '1.57',
            '1.56',
            '1.55',
            '1.54',
            '1.53',
            '1.52',
            '1.51',
            '1.50',
            '1.49',
            '1.48',
            '1.47',
            '1.46',
            '1.45',
            '1.44',
            '1.43',
            '1.42',
            '1.41',
            '1.40',
            '1.39',
            '1.38',
            '1.37',
            '1.36',
            '1.35',
            '1.34',
            '1.33',
            '1.32',
            '1.31',
            '1.30',
            '1.29',
            '1.28',
            '1.27',
            '1.26',
            '1.25',
            '1.24',
            '1.23',
            '1.22'
        ];

        foreach ($versions as $version) {

            // ETS2 (1)
            GameVersionMod::firstOrCreate([
                'game_mod_id' => 1,
                'version' => $version
            ]);

            // ATS (2)
            GameVersionMod::firstOrCreate([
                'game_mod_id' => 2,
                'version' => $version
            ]);
        }
    }
}
