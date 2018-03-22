<?php

use Faker\Generator as Faker;

$factory->define(App\Mprovider::class, function (Faker $faker) {
    return [
        'name_con_p' => $faker->name,
        'surname_con_p' => $faker->firstName,
        'patronymic_con_p' => $faker->lastName,
        'position_con_p' => 'Директор',
        'mobile_con_p' => '+7 (892) 900-76-88',
        'office_con_p' => '+7 (892) 900-76-88',
        'officedob_con_p' => 256,
        'email_con_p' => $faker->safeEmail,
        'provider_id' => $faker->randomNumber(1),
        'slug' => $faker->uuid,
    ];
});
