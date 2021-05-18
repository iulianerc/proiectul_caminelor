<?php

namespace seeds\com;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorizedPersonsTableSeeder extends Seeder
{
    private string $table = 'authorized_persons';

    public function run()
    {
        foreach ($this->getDump() as $packingType) {
            $packingType['created_at'] = now();
            $packingType['updated_at'] = now();
            DB::table($this->table)->insertOrIgnore($packingType);
        }
    }

    private function getDump(): array
    {
        return [
            [
                'name_en' => 'Ivana',
                'name_ro' => 'Ivana',
                'name_ru' => 'Ивана'
            ],
        ];
    }
}
