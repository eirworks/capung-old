<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        return view('projects.index', [
            'projects' => Project::public()
                ->withCount(['issues' => function($query) { $query->where('closed', false); }])
                ->with(['user:id,name'])
                ->paginate(),
            'title' => __('projects.browse'),
        ]);
    }

    public function myProjects(Request $request)
    {
        return view('projects.index', [
            'projects' => auth()->user()->projects()
                ->withCount(['issues' => function($query) { $query->where('closed', false); }])
                ->with(['user:id,name'])
                ->paginate(),
            'title' => __('projects.my_projects'),

        ]);
    }

    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project,
            'issues' => $project->issues()->take(5)->open()->get(),
            'active' => 'about',
        ]);
    }

    public function create()
    {
        $project = new Project();

        return view('projects.form', [
            'project' => $project,
        ]);
    }

    public function edit(Project $project)
    {
        $project = new Project();

        return view('projects.form', [
            'project' => $project,
        ]);
    }

    public function store(Request $request)
    {
        $project = new Project();

        return redirect()->route('projects.myProjects')
            ->with('success', __('messages.saved', ['item' => __('projects.project')]));
    }

    public function update(Request $request, Project $project)
    {
        return redirect()->route('projects.myProjects')
            ->with('success', __('messages.saved', ['item' => __('projects.project')]));
    }

    public function destroy(Request $request, Project $project)
    {
        $project->delete();

        return redirect()->route('projects.myProjects')
            ->with('success', __('messages.deleted', ['item' => __('projects.project')]));
    }
}
