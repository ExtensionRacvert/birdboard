<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    // Dashboard page
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    // Show a single project if a loggedin user is the project owner
    public function show(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects.show', compact('project'));
    }

    // Go to 'create' project page if you're loggedin
    public function create()
    {
        return view('projects.create');
    }

    // Create a project if you're authenticated
    public function store()
    {
        // Validate
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'notes' => 'min:3'
        ]);

        // Persist
        $project = auth()->user()->projects()->create($attributes);

        // Redirect
        return redirect($project->path());
    }

    // Go to edit page
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // Update a project
    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);

        // Validate
        $attributes = request()->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'notes' => 'nullable|min:3'
        ]);

        $project->update($request->toArray());

        return redirect($project->path());
    }
}
