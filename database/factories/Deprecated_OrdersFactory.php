<?php

namespace Database\Factories;

use App\Models\Client\Client;
use App\Models\Currency\Currency;
use App\Models\ExchangeRate\ExchangeRate;
use App\Models\Order\Order;
use App\Models\PurposesOfUse\PurposesOfUse;
use App\Models\Transport\Transport;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factory;
use Faker\Generator as Faker;

$a = 0;

/**
 * @var Factory $factory
 */
$factory->define(Order::class, static function (Faker $faker) use (&$a) {
    $a += 1;
    $lang = $faker->randomElement(['ro', 'en', 'ru']);
    $day = now()->isoFormat('DD');
    $month = now()->isoFormat('MM');
    $year = now()->isoFormat('YY');
    $client = Client::all()->random();
    $purposeOfUse = PurposesOfUse::all()->random();
    $currency = Currency::all()->random();
    $exchange = ExchangeRate::where('date', now()->isoFormat('YYYY-MM-DD'))
        ->where('currency_id', $currency->id)->first();

    return [
        'number'                => "ATA-{$day}{$month}{$year}-" . str_pad($a, 2, 0, STR_PAD_LEFT),
        'carnet_type'           => $faker->randomElement(['original', 'copy', 'replacement']),
        'release_mode'          => $faker->randomElement(['normal', 'urgent']),
        'carnet_number'         => 'MD ' . str_pad($a, 4, 0, STR_PAD_LEFT) . '/' . now()->isoFormat('YY'),
        'parent_carnet_id'      => null,
        'language'              => $lang,
        'outputs'               => $faker->numberBetween(1, 10),
        'valid_from'            => now(),
        'valid_to'              => now()->addYear()->subDay(),
        'source'                => $faker->randomElement(['operator', 'client']),
        'status_id'             => $faker->numberBetween(1, 6),
        'client_id'             => $client->id,
        'client_delegate'       => $client->name,
        'tax_payed'             => $faker->numberBetween(0, 1),
        'guaranty_payed'        => $faker->numberBetween(0, 1),
        'is_ata_exposition'     => $faker->numberBetween(0, 1),
        'required_guaranty_sum' => $faker->randomFloat(2, 10, 900000),
        'purpose_id'            => $purposeOfUse->id,
        'purpose_description'   => $purposeOfUse->{'description_' . $lang},
        'measure_unit'          => $faker->randomElement(['kg', 'g']),
        'currency_id'           => $currency->id,
        'exchange_rate'         => $exchange->value,
        'authorized_person_id'  => 1,
        'package_description'   => $faker->text,
        'transport_category_id' => Transport::all()->random()->id,
        'transport_description' => $faker->text,
        'manager_id'            => User::all()->random()->id,
        'created_at'            => now(),
        'updated_at'            => now(),
    ];
});
