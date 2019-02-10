<?php

use App\User;

/*
|--------------------------------------------------------------------------
| User Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$allStatus = User::ALL_STATUS;

$factory->define(User::class, function (Faker\Generator $faker) use ($allStatus) {
    return [
		'name'           => $faker->name,
		'email'          => $faker->unique()->freeEmail,
		'phone'          => '0'.$faker->numberBetween($min = 100000000, $max = 999999999),
		'password'       => '123456',
		'remember_token' => str_random(10),
		'status'         => $faker->randomElement($allStatus)
    ];
});
