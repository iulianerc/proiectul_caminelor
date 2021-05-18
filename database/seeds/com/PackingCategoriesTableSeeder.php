<?php

namespace seeds\com;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackingCategoriesTableSeeder extends Seeder
{
    private string $table = 'packing_categories';

    public function run()
    {
        foreach ($this->getDump() as $packingType) {
            $packingType['created_at'] = now();
            $packingType['updated_at'] = now();
            $packingType['author_id'] = app(User::class)->first()->id;
            DB::table($this->table)->insertOrIgnore($packingType);
        }
    }

    private function getDump(): array
    {
        return [
            [
                'name_en' => 'box',
                'name_ro' => 'cutie',
                'name_ru' => 'коробка'
            ],
        ];
    }
}
