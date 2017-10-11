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

    $role = $faker->randomElement(['student','teacher', 'admin']);

    return [
        'FirstName' => $faker->firstName($gender),
        'lastName' => $faker->lastName($gender),
        'avatar' => $faker->imageUrl($width = 250, $height = 250),
        'avatar_original' => $faker->imageUrl(),
        'role' => $role,
        'gender' => $gender,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'token' => str_random(10),
        'remember_token' => str_random(10),
    ];
});
