<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(10);


        return view('admin.projects.layouts.table', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.layouts.form', compact('project', 'types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        $project = Project::create($data);

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.layouts.form', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $project->update($data);

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        $restoredProject = Project::onlyTrashed()->findorFail($id);
        $restoredProject->restore();
        return redirect()->route('admin.projects.bin');
    }

    public function permanentDestroy(string $id)
    {
        $permanentDestroyedProject = Project::onlyTrashed()->findorFail($id);
        $permanentDestroyedProject->forceDelete();

        return redirect()->route('admin.projects.bin');
    }

    public function bin()
    {
        // if we are in front of a query builder we must use get() method
        $projects = Project::onlyTrashed()->paginate(10);

        return view('admin.projects.layouts.table', compact('projects'));
    }
}