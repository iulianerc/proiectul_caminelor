<?php

namespace seeds\com;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    private string $table = 'currencies';

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
                'name' => 'EUR',
                'code' => '978',
            ],
            [
                'name' => 'USD',
                'code' => '840',
            ],
            [
                'name' => 'RUB',
                'code' => '643',
            ],
            [
                'name' => 'RON',
                'code' => '946',
            ],
            [
                'name' => 'UAH',
                'code' => '980',
            ],
        ];
    }
}
