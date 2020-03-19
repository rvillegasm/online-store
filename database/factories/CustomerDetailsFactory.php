<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CustomerDetails;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(CustomerDetails::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'adress' => Str::random(20),
        'phone_number' => $faker->numberBetween(3000, 9000),
        'zip' => $faker->numberBetween(500, 1000),
        'user_id' => 2,
    ];
});
