<?php

namespace Database\Factories;

use App\Models\Hostel;
use App\Models\HostelRent;
use App\Models\Resident;
use App\Models\RoomCategory;
use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * Class HostelRentFactory
 * @package Database\Factories
 *
 * @property Generator $faker
 */
class HostelRentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HostelRent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'hostel_id'        => Hostel::all()->random()->id,
            'resident_id'      => Resident::all()->random()->id,
            'room_category_id' => RoomCategory::all()->random()->id,
            'created_at'       => now(),
            'updated_at'       => now(),
        ];
    }
}
