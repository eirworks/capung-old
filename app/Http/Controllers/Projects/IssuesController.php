<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Issue;
use App\Project;
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
}
