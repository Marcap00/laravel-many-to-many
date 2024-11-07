<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $typesIds = Type::all()->pluck("id");

        for ($i = 0; $i < 50; $i++) {
            $newProject = new Project();
            $newProject->type_id = $faker->randomElement($typesIds);
            $newProject->author = $faker->name() . ' ' . $faker->lastName();
            $newProject->title = $faker->sentence(4);
            $newProject->description = $faker->realText(100);
            $newProject->save();
        }
    }
}