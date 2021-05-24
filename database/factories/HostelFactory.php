<?php

namespace Database\Factories;

use App\Models\Hostel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator;

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
        /**
         * @var  Generator $faker
         */
        $faker = new Generator();
        dd($faker);
        return [
            'name'       => $faker->name,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
