<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
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

$factory->define(Order::class, function (Faker $faker) {
    return [
        'date_shipped' => $faker->dateTimeBetween('now', '+1 month'),
        'status' => $faker->regexify('(DELIVERED|PENDING|SHIPPED)'),
        'user_id' => $faker->numberBetween(1, 2),
    ];
});

?>