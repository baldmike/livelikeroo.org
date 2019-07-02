<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'first_name' => 'Bald',
        'last_name' => 'Mike',
        'role' => 'superadmin',
        'email' => 'baldmike312@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt('password'),
        'remember_token' => Str::random(10),
        
        // 'first_name' => $faker->firstName,
        // 'last_name' => $faker->lastName,
        // 'role' => $faker->randomElement($array = array ('volunteer', 'donor', 'monthly_donor', 'admin')),
        // 'email' => $faker->unique()->safeEmail,
        // 'email_verified_at' => now(),
        // 'password' => bcrypt('password'),
        // 'remember_token' => Str::random(10),
    ];
});
