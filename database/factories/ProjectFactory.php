<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use App\Faker\Project as FakeProject;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Project::class, function (Faker $faker) {

    $faker->addProvider(new FakeProject($faker));
    return [
        'name' => $faker->projectName(),
        'slug' => Str::slug($faker->projectName().'-'.$faker->randomNumber(4)),
        'user_id' => 1,
        'description' => $faker->realText(),
        'public' => $faker->boolean,
    ];
});
