<?php

namespace Database\Seeders\com;

use App\Models\Hostel;
use Illuminate\Database\Seeder;

class HostelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hostel::factory()->count(4)->create();
    }
}
