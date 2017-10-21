<?php

use Faker\Generator as Faker;

$factory->define(App\Parcour::class, function (Faker $faker) {
    return [
        'userId' => $faker->unique()->numberBetween(1,20),
        'parcourName' => str_random(10),
        'startPosition' => $faker->city(),
        'parcourDistance' => $faker->numberBetween(1,20),
        'endPosition' => $faker->city(),
        'startPositionLongitude' => $faker->longitude,
        'startPositionLatitude' => $faker->latitude,
        'endPositionLongitude' => $faker->longitude,
        'endPositionLatitude' => $faker->latitude,
        'eventCountdown' => $faker->unique()->dateTime(),
    ];
});
