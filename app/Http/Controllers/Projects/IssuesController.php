<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Issue;
use App\Project;
use Hamcrest\Core\Is;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    public function index(Request $request, Project $project)
    {
        $issues = $project->issues()
            ->orderBy('closed', 'asc')
            ->orderBy('id', 'desc')
            ->withCount(['comments'])
            ->paginate();

        return view('projects.issues', [
            'project' => $project,
            'issues' => $issues,
            'active' => 'issues',
        ]);
    }

    public function show(Project $project, Issue $issue)
    {
        $issue->load('user');
        $issue->loadCount(['comments']);
        return view('projects.issues.index', [
            'project' => $project,
            'issue' => $issue,
            'comments' => $issue->comments()->with(['user:id,name'])->paginate(),
        ]);
    }

    public function create(Project $project)
    {
        $issue = new Issue();
        return view('projects.issues.form', [
            'project' => $project,
            'issue' => $issue,
        ]);
    }

    public function edit(Project $project, Issue $issue)
    {
        return view('projects.issues.form', [
            'project' => $project,
            'issue' => $issue,
        ]);
    }

    public function store(Request $request, Project $project)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $issue = new Issue();

        $issue->title = $request->input('title');
        $issue->description = $request->input('description');
        $issue->project_id = $project->id;
        $issue->user_id = auth()->id();
        $issue->closed = false;

        $issue->save();

        return redirect()->route('projects.issues.show', [$project, $issue])
            ->with('success', __('messages.saved', ['item' => __('projects.issue')]));

    }

    public function update(Request $request, Project $project, Issue $issue)
    {
        $issue->title = $request->input('title');
        $issue->description = $request->input('description');

        $issue->save();

        return redirect()->route('projects.issues.show', [$project, $issue])
            ->with('success', __('messages.saved', ['item' => __('projects.issue')]));
    }

    public function destroy(Project $project, Issue $issue)
    {
        $issue->delete();

        return redirect()->route('projects.issues.index', [$project])
            ->with('success', __('messages.saved', ['item' => __('projects.issue')]));
    }
}
