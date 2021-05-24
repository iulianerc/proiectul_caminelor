<?php

namespace Database\Factories;

use App\Models\Hostel;
use App\Models\HostelRent;
use App\Models\Resident;
use App\Models\RoomCategory;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/**
 * @var Factory $factory
 */
$factory->define(HostelRent::class, static function (Faker $faker) {
    return [
        'hostel_id'        => Hostel::all()->random()->id,
        'resident_id'      => Resident::all()->random()->id,
        'room_category_id' => RoomCategory::all()->random()->id,
        'created_at'       => now(),
        'updated_at'       => now(),
    ];
});
