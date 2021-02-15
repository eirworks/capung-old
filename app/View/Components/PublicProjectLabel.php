<?php

namespace App\View\Components;

use App\Project;
use Illuminate\View\Component;

class PublicProjectLabel extends Component
{
    public $project = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($project)
    {
        $this->project = $project;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.public-project-label');
    }
}
