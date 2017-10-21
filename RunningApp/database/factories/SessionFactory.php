<?php

use Faker\Generator as Faker;

$factory->define(App\Session::class, function (Faker $faker) {
    return [
        'userId' => $faker->unique()->numberBetween(1,20),
        'parcourName' => str_random(10),
        'startPosition' => $faker->city(),
        'endPosition' => $faker->city(),
        'startPositionLongitude' => $faker->longitude,
        'startPositionLatitude' => $faker->latitude,
        'endPositionLongitude' => $faker->longitude,
        'endPositionLatitude' => $faker->latitude,
        'eventCountdown' => $faker->unique()->dateTime(),
    ];
});
