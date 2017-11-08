<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    $gender = $faker->randomElement(['m','f']);

    $straveToken = $faker->randomElement(['ef47221d83d15ea9cdddbabb3b97489983a74fc6','0965c349fe1925745b24d527abb2e36fc099a9f4','fa48718b5710d3a67574927ccfbeaa8225b28c49','e30928b9920b6fccc9eb1bbdc48c086cead12f49']);

    return [
        'id' => 42,
        'FirstName' => 'Robby',
        'lastName' => 'Tester',
        'avatar' => $faker->imageUrl($width = 250, $height = 250),
        'avatar_original' => $faker->imageUrl(),
        'gender' => 'M',
        'email' => $faker->unique()->safeEmail,
        'token' => $straveToken,
        'remember_token' => str_random(10),
    ];
});
