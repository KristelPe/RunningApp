<?php

use Faker\Generator as Faker;

$factory->define(App\Member::class, function (Faker $faker) {
    return [
        'userId' => $faker->numberBetween(1,20),
        'teamId' => $faker->numberBetween(1,20),
    ];
});
