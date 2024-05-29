<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;

class ProjectController extends Controller
{   public function home()
    {
        $projects = Project::paginate(5);
        return view('welcome', compact('projects'));
    }
    public function index(): View
    {
        $projects = Project::latest()->paginate(5);
        return view('projects.index', compact('projects'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        return view('projects.create');
    }

    public function store(ProjectStoreRequest $request): RedirectResponse
    {
        Project::create($request->validated());
        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function show(Project $project): View
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project): View
    {
        return view('projects.edit', compact('project'));
    }

    public function update(ProjectUpdateRequest $request, Project $project): RedirectResponse
    {
        $project->update($request->validated());
        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();
        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully');
    }
}
