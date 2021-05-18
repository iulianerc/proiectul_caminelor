<?php

namespace Database\Factories;

use App\Models\Employee\Employee;
use App\Models\User\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;


/** @var Factory $factory */
$factory->define(Employee::class, function (Faker $faker) {
    $gender = $this->faker->randomElement(['f', 'm']);
    return [
        'name'       => $faker->name($gender),
        'phones'     => $faker->numberBetween(10000000, 99999999),
        'gender'     => $gender,
        'email'      => random_int(0, 99999999) . 'test@mail.ru',
        'idnp'       => random_int(1111111111111, 9999999999999),
        'author_id'  => User::all()->random()->id,
        'user_id'    => User::all()->random()->id,
        'birthdate'  => $faker->dateTimeInInterval('-30 years', '-12 years'),
        'is_active'  => $faker->randomElement([true, false]),
        'created_at' => now(),
        'updated_at' => now(),
    ];

});
