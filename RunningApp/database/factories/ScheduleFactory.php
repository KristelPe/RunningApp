<?php

use Faker\Generator as Faker;

$factory->define(App\Schedule::class, function (Faker $faker) {


    $endDate = "2018-04-21";




        $endGoal = $faker->randomElement(array( 15));


    return [
        'id' => 1,
        'name' => '10 miles 2018',
        'endGoal' => $endGoal,
        'endDate' => $endDate,

    ];
});
