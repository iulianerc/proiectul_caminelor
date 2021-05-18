<?php

namespace seeds\com;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanksTableSeeder extends Seeder
{
    private string $table = 'banks';

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
                'name' => 'COMERŢBANK',
                'code' => 'Comertbank'
            ],
            [
                'name' => 'ENERGBANK',
                'code' => 'Energbank'
            ],
            [
                'name' => 'EuroCreditBank',
                'code' => 'ECB'
            ],
            [
                'name' => 'EXIMBANK',
                'code' => 'eximbank'
            ],
            [
                'name' => 'Moldindconbank',
                'code' => 'MICB'
            ],
            [
                'name' => 'MOLDOVA - AGROINDBANK',
                'code' => 'MAIB'
            ],
            [
                'name' => 'ProCredit Bank',
                'code' => 'procreditbank'
            ],
            [
                'name' => 'Banca Comercială Română Chişinău',
                'code' => 'BCR'
            ],
            [
                'name' => 'VICTORIABANK',
                'code' => 'victoriabank'
            ],
            [
                'name' => 'Banca de Finanţe şi Comerţ',
                'code' => 'fincombank'
            ],
            [
                'name' => 'Mobiasbanca - OTP Group',
                'code' => 'mobiasbanca'
            ],

        ];
    }
}
