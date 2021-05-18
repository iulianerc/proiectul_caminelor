<?php

namespace seeds\com;

use App\Models\OrderGuarantee\OrderGuarantee;
use Illuminate\Database\Seeder;

class OrderGuaranteesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OrderGuarantee::class,110)->create();
    }
}
