<?php

use Faker\Generator as Faker;

$factory->define(App\Provider::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'desc' => $faker->text($maxNbChars = 200),
        'link' => 'http://atis36.ru',
        'slug' => $faker->uuid,
    ];
});
