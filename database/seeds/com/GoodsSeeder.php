<?php

namespace seeds\com;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoodsSeeder extends Seeder
{
    private string $table = 'goods';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getDump() as $layout) {
            $layout['created_at'] = now();
            $layout['updated_at'] = now();
            DB::table($this->table)->insertOrIgnore($layout);
        }
    }

    private function getDump(): array
    {
        return [
            [
                'code'    => 'code 1',
                'name_ro' => 'name 1 ro',
                'name_ru' => 'name 1 ru',
                'name_en' => 'name 1 en',
            ],
            [
                'code'    => 'code 2',
                'name_ro' => 'name 2 ro',
                'name_ru' => 'name 2 ru',
                'name_en' => 'name 2 en',
            ],
            [
                'code'    => 'code 3',
                'name_ro' => 'name 3 ro',
                'name_ru' => 'name 3 ru',
                'name_en' => 'name 3 en',
            ],
        ];
    }
}
