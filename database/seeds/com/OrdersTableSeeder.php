<?php

namespace seeds\com;

use App\Models\Order\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    public function run(): void
    {
        Order::factory()->count(70)->create();
    }
}
