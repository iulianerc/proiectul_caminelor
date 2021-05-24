<?php

namespace Database\Seeders\com;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getDump() as $roomCategory) {
            $roomCategory['created_at'] = now();
            $roomCategory['updated_at'] = now();
            DB::table('room_categories')->insertOrIgnore($roomCategory);
        }
    }

    public function getDump(): array
    {
        return [
            [
                'name' => 'Camera de o persoana',
                'residents_max_count' => 2
            ],
            [
                'name' => 'Camera de 2 persoane',
                'residents_max_count' => 2
            ],
            [
                'name' => 'Camera de 3 persoane',
                'residents_max_count' => 4
            ],
            [
                'name' => 'Camera de 4 persoane',
                'residents_max_count' => 4
            ],
            [
                'name' => 'Camera lux pentru VIP',
                'residents_max_count' => 2
            ],
        ];
    }
}
