<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {

        $projects = Project::paginate(9);

        return view('welcome', compact('projects'));
    }
}