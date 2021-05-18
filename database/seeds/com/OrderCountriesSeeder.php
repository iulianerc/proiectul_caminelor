<?php

namespace seeds\com;

use App\Models\OrderCountry\OrderCountry;
use Illuminate\Database\Seeder;

class OrderCountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OrderCountry::class,70)->create();
    }
}
