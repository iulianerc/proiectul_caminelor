<?php

namespace Database\Factories;

use App\Models\Client\Client;
use App\Models\Order\Order;
use App\Models\OrderGuarantee\OrderGuarantee;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$a = 0;

/**
 * @var Factory $factory
 */
$factory->define(OrderGuarantee::class, static function (Faker $faker) {

    return [
        'client_id' => Client::all()->random()->id,
        'order_id' => Order::all()->random()->id,
        'sum' => $faker->randomFloat(2, 100, 1000000),
        'type' => $faker->randomElement(['bank_deposit', 'guaranty_letter']),
        'status' => $faker->randomElement(['new', 'confirmed', 'canceled']),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
