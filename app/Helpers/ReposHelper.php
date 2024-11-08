<?php


namespace App\Helpers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Http;

class ReposHelper
{
    public static function getRepos()
    {
        $username = 'Marcap00';
        $response = Http::withToken(env('GIT_HUB_ACCESS_TOKEN'))->get("https://api.github.com/repos/$username");
        if ($response->failed()) {
            throw new FileNotFoundException('Invalid or path not found');
        } else {
            return $response;
        }
    }
}