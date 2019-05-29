<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\CarePackage::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'address_1' => '1060 W. Addison',
        'city' => 'Chicago',
        'state' => 'IL',
        'zip' => '60657',
        'pet_name' => $faker->firstName,
        'about' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'diagnosis' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'sent' => 0,
        'species' => $faker->randomElement($array = array ('dog', 'cat', 'horse', 'squirrel', 'pigeon')),

    ];
});
