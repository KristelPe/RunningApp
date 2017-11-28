<?php

use App\User;
use Carbon\Carbon;
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

$factory->define(App\Leaderboard::class, function (Faker $faker) {

    return [

        'user_id'=> $faker->numberBetween(1,10),
        'max_speed' => $faker->numberBetween(3,15),
        'run_count' => $faker->numberBetween(1,100),
        'total_distance' => $faker->numberBetween(1000, 5000),
        'total_time' => $faker->numberBetween(300,1000),
        'avg_speed' => $faker->numberBetween(25,40),
        'avg_distance' => $faker->numberBetween(1000,5000),
        'created_at' => $faker->dateTime()
    ];
});
