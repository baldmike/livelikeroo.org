<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'title' => $faker->randomElement($array = array('shirt', 'hat', 'scarf')),
        'description' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'price' => $faker->numberBetween($min = 10, $max = 100),
        'size' => $faker->randomElement($array = array('S', 'M', 'L', 'XL')),
        'color' => $faker->randomElement($array = array('Lavender', 'Yellow', 'Blue', 'Green')),
        'image' => $faker->imageUrl($width = 320, $height = 240),
        'quantity' => $faker->numberBetween($min = 1, $max = 100)
    ];
});
