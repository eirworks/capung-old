<?php

use App\Comment;
use App\Issue;
use App\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->truncate();
        DB::table('issues')->truncate();
        DB::table('comments')->truncate();

        factory(Project::class, 5)->create()->each(function($project){
            $project->issues()->createMany(Issue::factory()->count(5)->make()->toArray());
        });

        $issues = Issue::get()->each(function($issue) {
            $issue->comments()->createMany(factory(Comment::class, 5)->make()->toArray());
        });
    }
}
