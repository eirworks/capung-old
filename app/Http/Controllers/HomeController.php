<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('dashboard', [
            'projects' => auth()->user()->projects()
                ->withCount(['issues' => function($query) { $query->where('closed', false); }])
                ->with(['user:id,name'])
                ->paginate(),
            'title' => __('projects.my_projects'),

        ]);
    }
}
