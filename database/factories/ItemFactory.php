<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
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

$factory->define(Item::class, function (Faker $faker) {
    return [
        'product_quantity' => $faker->numberBetween(0, 40),
        'sub_total' => $faker->randomFloat(2, 0, 100),
        'watch_id' => $faker->numberBetween(1, 20),
        'order_id' => $faker->numberBetween(1, 6),
    ];
});

?>