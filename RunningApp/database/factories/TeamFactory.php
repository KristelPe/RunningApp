<?php

use Faker\Generator as Faker;

$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'ownerId' => $faker->numberBetween(1,20),
        'teamName' => str_random(10),
    ];
});
