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
            'projects' => Project::latest('updated_at')
                ->withCount(['issues' => function($query) { $query->where('closed', false); }])
                ->with(['user:id,name'])
                ->paginate(),
            'title' => __('projects.browse'),
        ]);
    }

    public function show(Project $project)
    {
        $project->loadCount([
//            'reports' => function($q) { $q->where('closed', false); },
            'issues' => function($q) { $q->where('closed', false); },
        ]);

        $project->load(['user']);

        $issues = $project->issues()->open()->paginate();

        return view('projects.show', [
            'project' => $project,
            'issues' => $issues,
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required|',
        ]);

        $project = new Project();
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->slug = $request->input('slug');

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
