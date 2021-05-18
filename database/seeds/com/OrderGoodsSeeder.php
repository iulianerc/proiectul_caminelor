<?php

namespace seeds\com;

use App\Models\OrderCountry\OrderCountry;
use App\Models\OrderGood\OrderGood;
use Illuminate\Database\Seeder;

class OrderGoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OrderGood::class,500)->create();
    }
}
