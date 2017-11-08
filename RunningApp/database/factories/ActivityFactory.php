<?php

use Faker\Generator as Faker;

$factory->define(App\Activity::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->numberBetween(1,20),
        'athlete_id' => 42,
        'name' => $faker->word,
        'distance' => $faker->numberBetween(1,500),
        'start_date_local' => $faker->numberBetween(1,500),
        'moving_time' => $faker->numberBetween(1,500),
        'elapsed_time' => $faker->numberBetween(1,500),
        'kudos_count' => $faker->numberBetween(0,10),
        'max_speed' => $faker->numberBetween(1,10),
        'average_speed' => $faker->numberBetween(1,10),
        'type' => ("Run"),
    ];
});

    /*
    return [
        'id' => $faker->unique()->numberBetween(1,20),
        'athlete_id' => $faker->unique()->randomNumber(),
        'name' => $faker->word,
        'distance' => $faker->numberBetween(1,500),
        'start_date_local' => $faker->numberBetween(1,500),
        'moving_time' => $faker->numberBetween(1,500),
        'elapsed_time' => $faker->numberBetween(1,500),
        'kudos_count' => $faker->numberBetween(0,10),
        'max_speed' => $faker->numberBetween(1,10),
        'average_speed' => $faker->numberBetween(1,10),
        'type' => ("Run"),
    ];
    */
