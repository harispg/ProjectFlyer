<?php

use Faker\Generator as Faker;


$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Flyer::class, function (Faker $faker) {
    return [
        'user_id' => factory('App\User')->create()->id,
        'street' => $faker->streetAddress,
        'city' => $faker->city,
        'zip' => $faker->postCode,
        'country' => $faker->country,
        'state' => $faker->state,
        'description' => $faker->paragraph(3),
        'price' => $faker->numberBetween(10000, 5000000),
    ];
});
