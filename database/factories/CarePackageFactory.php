<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\CarePackage;
use Faker\Generator as Faker;

$factory->define(CarePackage::class, function (Faker $faker) {
    return [
        

        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'address_1' => '333 W 35th Street',
        'city' => 'Chicago',
        'state' => 'IL',
        'zip' => '60616',

        'pet_name' => $faker->firstName,
        'species' => $faker->randomElement($array = array ('dog', 'cat', 'horse', 'squirrel',)),
        'about' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'diagnosis' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        
        'sent' => 0,
        

    ];
});
