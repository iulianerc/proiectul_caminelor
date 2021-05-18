<?php

namespace seeds\com;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodsTableSeeder extends Seeder
{
    private string $table = 'payment_methods';

    public function run()
    {
        foreach ($this->getDump() as $item) {
            DB::table($this->table)->insertOrIgnore($item);
        }
    }

    private function getDump(): array
    {
        return [
            [
                'alias' => 'mpay',
                'name_ro' => 'MPay',
                'name_en' => 'MPay',
                'name_ru' => 'MPay',
            ],
            [
                'alias' => 'cash',
                'name_ro' => 'Numerar',
                'name_en' => 'Cash',
                'name_ru' => 'Наличные',
            ],
            [
                'alias' => 'transfer',
                'name_ro' => 'Transfer bancar',
                'name_en' => 'Bank transfer',
                'name_ru' => 'Банковский перевод',
            ],
            [
                'alias' => 'deposit',
                'name_ro' => 'Depozit bancar',
                'name_en' => 'Bank deposit',
                'name_ru' => 'Банковский депозит',
            ],
        ];
    }
}
