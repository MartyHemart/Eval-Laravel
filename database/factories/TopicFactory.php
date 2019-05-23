<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Topic;
use Faker\Generator as Faker;

$factory->define(Topic::class, function (Faker $faker) {
    return [
       'titre' => $faker->text($maxNbChars = 75),
       'message' => $faker->sentence,
    ];
});
