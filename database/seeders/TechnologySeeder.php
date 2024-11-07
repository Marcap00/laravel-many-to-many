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
                'color' => '#F16A2F'
            ],
            [
                'name' => 'css',
                'color' => '#306AF1'
            ],
            [
                'name' => 'javascript',
                'color' => '#F7E025'
            ],
            [
                'name' => 'php',
                'color' => '#7B7FB5'
            ],
            [
                'name' => 'vue',
                'color' => '#36BB86'
            ],
            [
                'name' => 'laravel',
                'color' => '#FF3427'
            ]
        ];

        foreach ($technologies as $t) {
            Technology::create([
                'name' => $t['name'],
                'color' => $t['color'],
            ]);
        }
    }
}