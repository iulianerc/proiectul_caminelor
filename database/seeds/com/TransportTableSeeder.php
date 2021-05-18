<?php

namespace seeds\com;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportTableSeeder extends Seeder
{
    private string $table = 'transports';

    public function run()
    {
        foreach ($this->getDump() as $item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            $item['author_id'] = app(User::class)->first()->id;
            DB::table($this->table)->insertOrIgnore($item);
        }
    }

    private function getDump(): array
    {
        return [
            [
                'name_ro' => 'Automobil',
                'name_en' => 'Car',
                'name_ru' => 'Машина',
            ],
            [
                'name_ro' => 'Avion',
                'name_en' => 'Plane',
                'name_ru' => 'Самолет',
            ],
            [
                'name_ro' => 'Autocamion',
                'name_en' => 'Lorry',
                'name_ru' => 'Грузовик',
            ],
            [
                'name_ro' => 'Tren',
                'name_en' => 'Train',
                'name_ru' => 'Поезд',
            ],
        ];
    }
}
