<?php

use Faker\Generator as Faker;

$factory->define(App\Activity::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->numberBetween(1,200),
        'athlete_id' => $faker->numberBetween(1,10),
        'name' => $faker->word,
        'distance' => $faker->numberBetween(1,500),
        //'start_date_local' => $faker->numberBetween(1,500),
        'start_date_local' => "2017-11-12",
        'moving_time' => $faker->numberBetween(1,500),
        'elapsed_time' => $faker->numberBetween(1,500),
        'kudos_count' => $faker->numberBetween(0,10),
        'max_speed' => $faker->numberBetween(1,10),
        'average_speed' => $faker->numberBetween(1,10),
        'type' => ("Run"),
        'map_polyline' => "shkvHqlgZuVca@zZkn@b@{Em_@{g@_BpE_GcD_G~A{@d@NdE",
        'elev_high' => $faker->numberBetween(1,15),
        'elev_low' => $faker->numberBetween(1,15),

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
