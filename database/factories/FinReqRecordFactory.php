<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\FinReqRecord;

use Faker\Generator as Faker;

$factory->define(FinReqRecord::class, function (Faker $faker) {
    return [
        'filename' => '/records/sample_med_records.pdf'
    ];
});
