<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Habit;
use Faker\Generator as Faker;

$factory->define(Habit::class, function (Faker $faker) {
    // $ratings = $faker->randomElement(['far fa-frown', 'far fa-meh', 'far fa-smile']);
    return [
        'description' => $faker->text($maxNbChars = 30),
        'reason' => $faker->text($maxNbChars = 140),
        // 'rating' => $ratings,
    ];
});
