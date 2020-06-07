<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\events;
use Faker\Generator as Faker;

$factory->define(\App\tickets::class, function (Faker $faker) {
    return [
        //
        'type'=>$faker->unique()->text,
        'descrip'=>$faker->unique()->text,
        'price'=>$faker->unique()->randomNumber(),
        'available_tickets'=>$faker->randomDigit,
        'sold_tickets'=>0,

    ];
});
