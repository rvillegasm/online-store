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
    $number = $faker->numberBetween(1, 5);

    return [
        'name' => $faker->name,
        'quantity' => $faker->numberBetween(1, 40),
        'color' => $faker->randomElement(['BLACK', 'BLUE', 'GRAY']),
        'brand' => $faker->company,
        'reference' => strtoupper(Str::random(6)),
        'gender' => $faker->randomElement(['MALE', 'FEMALE', 'NONE']),
        'price' => $faker->numberBetween(200, 9000),
        'image' => 'watch/w'.$number.'.jpg',
        'description' => 'A battery life of up to 2 years, and with features covering safety, activity, lifestyle and more',
        'category_id' => $number,
    ];
});
