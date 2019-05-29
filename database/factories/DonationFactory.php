<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Donation;
use Faker\Generator as Faker;

$factory->define(Donation::class, function (Faker $faker) {
    return [
        'amount' => $faker->numberBetween($min = 10, $max = 100),
        'first_name' => $faker->firstName,
        'last_name' => $faker->firstName,
        'name_on_card' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'in_memory' => 1,
        'frequency' => $faker->randomElement($array = array('one-time', 'monthly')),
        'honoree' => $faker->name,
        'recipient_name' => $faker->name,
        'recipient_email' => $faker->unique()->safeEmail,
        'recipient_msg' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'fund' => $faker->randomElement($array = array('roo', 'cappy', 'roo', 'booker', 'roo', 'maggie', 'roo', 'serenity' )),
        'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
    ];
});
