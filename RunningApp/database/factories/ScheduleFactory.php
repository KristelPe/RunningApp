<?php

use Faker\Generator as Faker;

$factory->define(App\Schedule::class, function (Faker $faker) {


    $endDate = "2018-04-22";




        $endGoal = $faker->randomElement(array( 15));


    return [
        'id' => 1,
        'endGoal' => $endGoal,
        'endDate' => $endDate,

    ];
});
