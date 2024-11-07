<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = [
            [
                'name' => 'html',
            ],
            [
                'name' => 'css',
            ],
            [
                'name' => 'javascript',
            ],
            [
                'name' => 'php',
            ],
            [
                'name' => 'vue',
            ],
            [
                'name' => 'laravel',
            ]
        ];

        foreach ($technologies as $t) {
            Technology::create([
                'name' => $t['name'],
                'color' => $faker->unique()->hexColor(),
            ]);
        }
    }
}