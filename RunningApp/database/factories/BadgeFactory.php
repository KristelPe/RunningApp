<?php

use Faker\Generator as Faker;

$factory->define(App\Badge::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->numberBetween(0,15),
        'image' => 'https://cdn0.iconfinder.com/data/icons/gamification-flat-awards-and-badges/500/star13-512.png',
        'title' => $faker->title(),
        'description' => $faker->text()
    ];
});

