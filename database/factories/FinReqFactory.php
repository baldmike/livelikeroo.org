<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\FinReq;
use Faker\Generator as Faker;

$factory->define(FinReq::class, function (Faker $faker) {
    return [

        'status' => $faker->randomElement($array = array ('new', 'in progress', 'declined', 'approved', 'funded')),
        // 'award_amount' => $faker->randomElement(($array = array('0', '500', '1000', '1500'))),

        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'address_1' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->state,
        'zip' => $faker->postcode,

        'pet_name' => $faker->firstName,
        'image' => $faker->randomElement($array = array ('/images/puppy.jpg', '/images/puppy2.jpg', '/images/puppy3.jpg', '/images/puppy4.jpg', '/images/puppy5.jpg', '/images/puppy6.jpg', '/images/cat1.jpg', '/images/cat2.jpg', '/images/cat3.jpg', '/images/cat5.jpg', '/images/cat6.jpg', '/images/cat7.jpg')),
        'species' => $faker->randomElement($array = array ('dog', 'cat', 'horse', 'squirrel', 'pigeon')),
        'breed' => $faker->city,
        'age' => $faker->randomDigitNotNull,
        'gender' => $faker->randomElement($array = array('m', 'f')),
        'altered' => $faker->randomElement($array = array (0, 1)),
        'about' => $faker->realText($maxNbChars = 200, $indexSize = 2),

        'diagnosis' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'diagnosis_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'previous_diagnosis' => $faker->randomElement($array = array(0, 1)),

        'vet_first_name' => $faker->firstName,
        'vet_last_name' => $faker->lastName,
        'primary_clinic_name' => $faker->company,
        'primary_clinic_phone' => $faker->phoneNumber,
        'primary_clinic_email' => $faker->safeEmail,
        'specialist' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'other_help' => $faker->realText($maxNbChars = 200, $indexSize = 2),


        
    ];
});



