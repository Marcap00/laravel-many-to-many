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
        /* $typesIds = Type::all()->pluck("id");
        $projects = [
            [
                'title' => 'laravel-dc-comics',
                'author' => 'MarCap',
                'type_id' => 3,
            ],
            [
                'title' => 'laravel-many-to-many',
                'author' => 'MarCap',
                'type_id' => 3,
            ],
            [
                'title' => 'laravel-auth',
                'author' => 'MarCap',
                'type_id' => 3,
            ],
            [
                'title' => 'vite-yu-gi-oh',
                'author' => 'MarCap',
                'type_id' => 1,
            ],
            [
                'title' => 'vite-comics',
                'author' => 'MarCap',
                'type_id' => 1,
            ],
            [
                'title' => 'vite-boolflix',
                'author' => 'MarCap',
                'type_id' => 1,
            ],
            [
                'title' => 'vue-bolzapp',
                'author' => 'MarCap',
                'type_id' => 1,
            ],
            [
                'title' => 'proj-html-vuejs',
                'author' => 'MarCap, Francesco, Tanara, Daniele',
                'type_id' => 1,
            ],
            [
                'title' => 'php-oop-1',
                'author' => 'MarCap',
                'type_id' => 2,
            ],
            [
                'title' => 'php-oop-2',
                'author' => 'MarCap',
                'type_id' => 2,
            ],
            [
                'title' => 'html-spotify-web',
                'author' => 'MarCap',
                'type_id' => 1,
            ],
            [
                'title' => 'html-bootstrap-dashboard',
                'author' => 'MarCap',
                'type_id' => 1,
            ],
            [
                'title' => 'js-our-team',
                'author' => 'MarCap',
                'type_id' => 1,
            ],
        ]; */

        $projects = ReposHelper::getRepos();


        foreach ($projects as $project) {

            /* echo $project['name']; */

            $newProject = new Project();
            $newProject->title = $project['name'];
            $newProject->author = $project['owner']['login'];
            if (Str::contains($project['name'], 'laravel')) {
                $newProject->type_id = 3;
            } elseif (Str::contains($project['name'], ['vite', 'vue', 'html', 'css', 'js', 'javascript'])) {
                $newProject->type_id = 1;
            } elseif (Str::contains($project['name'], 'php')) {
                $newProject->type_id = 2;
            } else {
                $newProject->type_id = 1;
            }
            $newProject->description = 'ciao';
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

            /*
            $newProject = new Project();
            $newProject->type_id = $project['type_id'];
            $newProject->author = $project['author'];
            $newProject->title = $project['title'];
            $newProject->description = $faker->realText(150);
            $newProject->save();
            */
        }
    }
}
