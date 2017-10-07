<?php

use Faker\Generator as Faker;

$factory->define(\App\InvoiceItem::class, function (Faker $faker) {
    return [
        'invoice_id' =>function(){
            return factory(\App\Invoice::class)->create()->id;
        },
        'description' =>$faker->sentence,
        'qty' => $faker->numberBetween(1,7),
        'unit_price' => $faker->numberBetween(100,400),

    ];
});
