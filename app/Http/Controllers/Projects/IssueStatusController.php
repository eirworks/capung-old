<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Issue;
use App\Project;
use Illuminate\Http\Request;

class IssueStatusController extends Controller
{
    // Toggle open and closing
    public function update(Project $project, Issue $issue, Request $request)
    {
        $issue->closed = !$issue->closed;
        $issue->save();

        return redirect()->route('projects.issues.show', [$project, $issue])
            ->with('success', __('messages.'.($issue->closed ? 'closed' : 'reopen'), ['item' => __('projects.issue')]));
    }
}
