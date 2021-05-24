<?php

namespace Database\Seeders\com;

use App\Models\Hostel;
use App\Models\Resident;
use Illuminate\Database\Seeder;

class ResidentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Resident::factory()->count(20)->create();
    }
}
