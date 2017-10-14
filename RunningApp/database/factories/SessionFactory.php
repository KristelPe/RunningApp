<?php

use Faker\Generator as Faker;

$factory->define(App\Session::class, function (Faker $faker) {
    return [
        'userId' => $faker->unique()->numberBetween(1,20),
        'startPosition' => $faker->city(),
        'endPosition' => $faker->city(),
        'startPositionLongitude' => $faker->longitude,
        'startPositionLatitude' => $faker->latitude,
        'endPositionLongitude' => $faker->longitude,
        'endPositionLatitude' => $faker->latitude,
        'groupName' => $faker->randomAscii,
        'eventCountdown' => $faker->unique()->dateTime(),
    ];
});
