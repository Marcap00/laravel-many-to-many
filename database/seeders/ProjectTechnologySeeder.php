<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // All Projects
        $projects = Project::all();

        // All IDs Technologies
        $technologies = Technology::all()->pluck('id');

        $projects[0]->technologies()->sync([6]);
        $projects[1]->technologies()->sync([6]);
        $projects[2]->technologies()->sync([6]);
        $projects[3]->technologies()->sync([5]);
        $projects[4]->technologies()->sync([5]);
        $projects[5]->technologies()->sync([5]);
        $projects[6]->technologies()->sync([5]);
        $projects[7]->technologies()->sync([5]);
        $projects[8]->technologies()->sync([4]);
        $projects[9]->technologies()->sync([4]);
        $projects[10]->technologies()->sync([1]);
        $projects[11]->technologies()->sync([1]);
        $projects[12]->technologies()->sync([3]);
    }
}