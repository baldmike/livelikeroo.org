<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\FinReqNote;
use App\Models\User;

use Faker\Generator as Faker;

$factory->define(FinReqNote::class, function (Faker $faker) {
    return [
        'user_id' => User::where('role', 'superadmin')->get()->random()->id,
        'note' => $faker->realText($maxNbChars = 200, $indexSize = 2)
    ];
});
