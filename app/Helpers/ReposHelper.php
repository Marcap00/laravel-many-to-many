<?php


namespace App\Helpers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Http;

class ReposHelper
{
    public static function getRepos()
    {
        $username = 'Marcap00';
        $response = Http::withToken(env('GIT_HUB_ACCESS_TOKEN'))
            ->withOptions(['verify' => false])
            ->get("https://api.github.com/repos/" . $username);

        return $response;
    }
}