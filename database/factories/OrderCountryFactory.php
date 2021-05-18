<?php

namespace Database\Factories;

use App\Models\Client\Client;
use App\Models\Country\Country;
use App\Models\Currency\Currency;
use App\Models\ExchangeRate\ExchangeRate;
use App\Models\Order\Order;
use App\Models\OrderCountry\OrderCountry;
use App\Models\PurposesOfUse\PurposesOfUse;
use App\Models\Transport\Transport;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factory;
use Faker\Generator as Faker;

/**
 * @var Factory $factory
 */
$factory->define(OrderCountry::class, static function (Faker $faker) {
    $acceptAtaCarnetCountry = Country::where('accept_ata', 1)->get()->random();

    return [
        'order_id'   => $faker->randomElement([1, 2, 3]),
        'country_id' => $acceptAtaCarnetCountry->id,
        'scope'      => $faker->randomElement(['destination', 'transit']),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
