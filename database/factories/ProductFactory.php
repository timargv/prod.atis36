<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'num' => $faker->randomNumber(5),
        'site' => 'http://atis36.ru',
        'prc' => $faker->randomNumber(5),
        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'image' => '',
        'category_id' => $faker->randomNumber(1),
        'provider_id' => $faker->randomNumber(1),
        'status' => 1
    ];
});
