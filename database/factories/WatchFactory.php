<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Watch;
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

$factory->define(Watch::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'quantity' => $faker->numberBetween(1, 40),
        'color' => Str::random(5),
        'brand' => $faker->company,
        'reference' => Str::random(10),
        'gender' => Str::random(7),
        'price' => $faker->numberBetween(200, 9000),
        'image' => Str::random(20),
        'description' => Str::random(99),
    ];
});