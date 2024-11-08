<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Helpers\ReposHelper;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $projects = ReposHelper::getRepos();

        foreach ($projects as $project) {

            /* echo $project['name']; */

            $newProject = new Project();
            $newProject->title = $project['name'];
            $newProject->author = $project['owner']['login'];
            if (Str::contains($project['name'], 'laravel')) {
                $newProject->type_id = 4;
            } elseif (Str::contains($project['name'], ['vite', 'vue', 'html', 'css', 'js', 'javascript'])) {
                $newProject->type_id = 2;
            } elseif (Str::contains($project['name'], 'php')) {
                $newProject->type_id = 3;
            } elseif (Str::contains($project['name'], ['db', 'database', 'sql'])) {
                $newProject->type_id = 5;
            } else {
                $newProject->type_id = 1;
            }
            $newProject->description = $project['description'];
            $newProject->url = $project['url'];
            $newProject->save();

            /* Project::create([
                'title' => $project['name'],
                'author' => $project['owner']['login'],
                if (Str::contains($project['name'], 'laravel')) {
                    'type_id' => 3,
                } elseif (Str::contains($project['name'], ['vite', 'vue', 'html', 'css', 'js', 'javascript'])) {
                    'type_id' => 1,
                } elseif (Str::contains($project['name'], 'php')) {
                    'type_id' => 2,
                };
            ]); */
        }
    }
}
