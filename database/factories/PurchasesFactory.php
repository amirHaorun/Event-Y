<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\events;
use Faker\Generator as Faker;

$factory->define(\App\Purchases::class, function (Faker $faker) {
    return [
        //
        'user_id'=>\App\user::all()->random()->id,
        'ticket_id'=>\App\tickets::all()->random()->id,
        'show_id'=>\App\shows::all()->random()->id,
        'quantity'=>$faker->randomDigit,
        'status'=>"PENDING",
        'value'=>$faker->randomFloat(),


    ];
});

