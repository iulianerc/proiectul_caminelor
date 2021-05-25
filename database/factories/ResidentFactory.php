<?php

namespace Database\Factories;

use App\Models\Resident;
use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class ResidentFactory
 * @package Database\Factories
 *
 * @property Generator $faker
 */

class ResidentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resident::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'idnp'       => $this->faker->numberBetween(1000000000000, 9999999999999),
            'name'       => $this->faker->name,
            'phones'     => $this->faker->randomElement([$this->faker->phoneNumber.','.$this->faker->phoneNumber, $this->faker->phoneNumber]),
            'email' => $this->faker->email,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
