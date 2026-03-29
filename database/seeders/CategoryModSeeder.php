<?php

namespace Database\Seeders;

use App\Models\CategoryMod;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategoryModSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Caminhões',
            'Trailers',
            'Mapas',
            'Skins',
            'Sons',
            'Físicas',
            'Gráficos',
            'Clima',
            'Tráfego',
            'IA',
            'Interior',
            'Dashboard',
            'Acessórios',
            'Partes e tunagem',
            'Companhias',
            'Pack de cargas',
            'Economia',
            'Multiplayer',
            'Ferramentas',
            'Outros'
        ];

        foreach ($categories as $category) {
            CategoryMod::firstOrCreate([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
