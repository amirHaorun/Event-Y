<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\events;
use Faker\Generator as Faker;

$factory->define(events::class, function (Faker $faker) {
        return [
            //
            'name' => $faker->unique()->name,
            'descrip' => $faker->word,
            'venue' => $faker->address,
            'photo_id' => 1,

        ];


});

