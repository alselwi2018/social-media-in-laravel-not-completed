<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\comment;
use Faker\Generator as Faker;

$factory->define(comment::class, function (Faker $faker) {
    return [
        'title' => $faker->text(10),
        'txt' => $faker->text(200),
        'media' => $faker->text(30)
    ];
});
