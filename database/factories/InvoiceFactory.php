<?php

use Faker\Generator as Faker;

$factory->define(App\Invoice::class, function (Faker $faker) {
    $discount = $faker->numberBetween(0,100);
    $subtotal = $faker->numberBetween(500,1000);

    return [
        'customer_id' => function(){
            return factory(\App\Customer::class)->create()->id;
        },
        'title' => $faker->sentence,
        'date'=> '2017-'.mt_rand(1,12).'-'.mt_rand(1,28),
        'due_date'=> '2017-'.mt_rand(1,12).'-'.mt_rand(1,28),
        'discount' => $discount,
        'sub_total' => $subtotal,
        'total' => $subtotal - $discount,
    ];
});
