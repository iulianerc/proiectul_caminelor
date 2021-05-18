<?php

namespace Database\Factories;

use App\Models\Country\Country;
use App\Models\Currency\Currency;
use App\Models\OrderGood\OrderGood;
use Illuminate\Database\Eloquent\Factory;
use Faker\Generator as Faker;

/**
 * @var Factory $factory
 */
$factory->define(OrderGood::class, static function (Faker $faker) {
    $acceptAtaCarnetCountry = Country::where('accept_ata', 1)->get()->random();
    $randCurrencyPrice = Currency::all()->random()->exchange()->latest()->first()->value;
    $acceptAtaCarnetCountry = Country::where('accept_ata', 1)->get()->random();

    return [
        'name'              => $faker->company,
        'quantity'          => $faker->numberBetween(1, 10),
        'size'              => $faker->randomFloat(4, 1, 70),
        'price_currency'    => $randCurrencyPrice,
        'price'             => $faker->numberBetween(1, 1000),
        'order_id'          => $faker->randomElement([1, 2, 3]),
        'origin_country_id' => $acceptAtaCarnetCountry,
        'created_at'        => now(),
        'updated_at'        => now(),
    ];
});
