<?php

namespace seeds\com;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemVariableBookSeeder extends Seeder
{
    private string $table = 'system_variable_books';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getDump() as $item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            DB::table($this->table)->insertOrIgnore($item);
        }
    }

    private function getDump(): array
    {
        return [
            [
                'name'     => 'Denumirea Camerei de Comerț și Industrie a Republici Moldova',
                'alias'    => 'SYSTEM_NAME',
                'value_ro' => 'Camera de Comerț și Industrie',
                'value_en' => 'Chamber of Commerce and Industry of the Republic of Moldova',
                'value_ru' => 'Торгово-промышленная палата Республики Молдова'
            ], [
                'name'     => 'Adresa CCI',
                'alias'    => 'SYSTEM_ADDRESS',
                'value_ro' => 'mun. Chișinău, MD- 2004bd. Ștefan cel Mare, 151',
                'value_en' => 'mun. Chișinău, MD- 2004bd. Ștefan cel Mare, 151',
                'value_ru' => 'mun. Chișinău, MD- 2004bd. Ștefan cel Mare, 151'
            ], [
                'name'     => 'Telefoanele CCI',
                'alias'    => 'SYSTEM_PHONES',
                'value_ro' => '+ 373 22 | 22 15 52',
                'value_en' => '+ 373 22 | 22 15 52',
                'value_ru' => '+ 373 22 | 22 15 52'
            ], [
                'name'     => 'Numărul de Fax al CCI',
                'alias'    => 'SYSTEM_FAX',
                'value_ro' => '+ 373 22 | 23 44 25',
                'value_en' => '+ 373 22 | 23 44 25',
                'value_ru' => '+ 373 22 | 23 44 25'
            ],
            [
                'name'     => 'Adresa(adresele) de mail a CCI',
                'alias'    => 'SYSTEM_EMAIL',
                'value_ro' => 'camera@chamber.md',
                'value_en' => 'camera@chamber.md',
                'value_ru' => 'camera@chamber.md'
            ],
            [
                'name'     => 'IDNO-ul CII',
                'alias'    => 'SYSTEM_IDNO',
                'value_ro' => '112144587789',
                'value_en' => '112144587789',
                'value_ru' => '112144587789'
            ],
            [
                'name'     => 'IBAN-ul CII',
                'alias'    => 'SYSTEM_IBAN',
                'value_ro' => 'MD45AG000000022511883835',
                'value_en' => 'MD45AG000000022511883835',
                'value_ru' => 'MD45AG000000022511883835'
            ],
            [
                'name'     => 'Numele bank-ului ',
                'alias'    => 'SYSTEM_bank',
                'value_ro' => 'BC Moldova Agroindbank SA c/b AGRNMD2X',
                'value_en' => 'BC Moldova Agroindbank SA c/b AGRNMD2X',
                'value_ru' => 'BC Moldova Agroindbank SA c/b AGRNMD2X'
            ],
        ];
    }
}
