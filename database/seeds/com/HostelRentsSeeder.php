<?php

namespace Database\Seeders\com;

use App\Models\HostelRent;
use Illuminate\Database\Seeder;

class HostelRentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HostelRent::factory()->count(20)->create();
    }
}
