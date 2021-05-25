<?php

namespace Database\Factories;

use App\Models\Hostel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator;


/**
 * Class HostelFactory
 * @package Database\Factories
 *
 * @property Generator $faker
 */
class HostelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hostel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {

        return [
            'name'       => $this->faker->company,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
