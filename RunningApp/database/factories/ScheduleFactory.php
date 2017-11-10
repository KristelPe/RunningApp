<?php

use Faker\Generator as Faker;

$factory->define(App\Schedule::class, function (Faker $faker) {

    $userMax = \App\User::find(DB::table('users')->max('id'));
    $maxId = $userMax->id;
    $endDate = $faker->date('Y-m-d', 'now');
    $endDate = preg_replace('/[^0-9.]+/', '', $endDate);

    $endGoalIn = $faker->randomElement(array('t', 'd'));
    if ($endGoalIn == 't'){
        $endGoal = $faker->randomElement(array(30, 60, 90));
    }else{
        $endGoal = $faker->randomElement(array(5, 10, 15));
    }

    return [
        'id' => $faker->unique()->randomNumber(),
        'name' => $faker->realText(10, 2),
        'ownerId' => $faker->numberBetween(1, $maxId),
        'endGoal' => $endGoal,
        'endGoalIn' => $endGoalIn,
        'endDate' => $endDate,

    ];
});
