<?php

namespace Database\Factories;

use App\Models\Hostel;
use App\Models\Resident;
use Illuminate\Database\Eloquent\Factory;
use Faker\Generator as Faker;

/**
 * @var Factory $factory
 */
$factory->define(Resident::class, static function (Faker $faker) {
    return [
        'idnp'       => $faker->numberBetween(1000000000000, 9999999999999),
        'name'       => $faker->name,
        'phones'     => $faker->randomElement([$faker->phoneNumber.','.$faker->phoneNumber, $faker->phoneNumber]),
        'email' => $faker->email,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
