<?php

use Faker\Generator as Faker;

$factory->define(App\Badge::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->numberBetween(0,15),
        'image' => $faker->imageUrl($width = 100, $height = 100),
        'title' => $faker->title(),
        'description' => $faker->text()
    ];
});

