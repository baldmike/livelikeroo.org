<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'message' => $faker->realText($maxNbChars = 200, $indexSize = 2)
    ];
});
