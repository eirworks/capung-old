<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Issue;
use Faker\Generator as Faker;

$factory->define(Issue::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'project_id' => 1,
        'title' => $faker->issueTitle(),
        'description' => $faker->realText(),
        'closed' => $faker->boolean,
    ];
});
