<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class ProjectSettingsController extends Controller
{
    public function index(Project $project)
    {
        return view('projects.settings', [
            'settings' => [],
        ]);
    }
}
