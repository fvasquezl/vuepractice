<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'company' => $faker->company,
        'email'=> $faker->email,
        'name'=> $faker->name,
        'phone'=> $faker->phoneNumber,
        'address'=> $faker->address
    ];
});
