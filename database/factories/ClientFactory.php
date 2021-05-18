<?php

use App\Models\Client\Client;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

/**
 * @var Factory $factory
 */
$factory->define(Client::class, static function (Faker $faker) {
    $address = $faker->address;
    return [
        "type" => $faker->randomElement(['physical', 'juridical']),
        "idno" => $faker->numberBetween(1000000000000, 9999999999999),
        "name" => $faker->name(),
        "vat_code" => Str::random(15),
        "identity_card" => 'MD - xxxxx xxx',
        "identity_card_date" => $faker->date(),
        "administrator_name" => $faker->name(),
        "identity_card_issued" => $faker->company,
        'address_ro' => $address,
        'address_en' => $address,
        'address_ru' => $address,
        'address_home' => $faker->address,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
