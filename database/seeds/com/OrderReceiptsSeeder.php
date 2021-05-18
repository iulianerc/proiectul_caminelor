<?php

namespace seeds\com;

use App\Models\OrderReceipt\OrderReceipt;
use App\Models\SystemVariableBook\SystemVariableBook;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderReceiptsSeeder extends Seeder
{
    private string $table = 'order_receipts';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cciInfo = json_encode([
            'name'      => SystemVariableBook::where('alias', 'SYSTEM_NAME')->first()->value_en,
            'idno'      => SystemVariableBook::where('alias', 'SYSTEM_IDNO')->first()->value_en,
            'iban'      => SystemVariableBook::where('alias', 'SYSTEM_IBAN')->first()->value_en,
            'bank_name' => SystemVariableBook::where('alias', 'SYSTEM_BANK')->first()->value_en,
        ]);
        $services = json_encode([
            'items'  => [
                [
                    'id'   => 1,
                    'name' => 'Perfectarea carnetului pentru persoana fizica în regim normal - taxa achitata pentru eliberarea carnetului în regim normal de către persoana fizica',
                    'sum'  => 1900
                ]
            ],
            'totals' => 1900
        ]);

        DB::table('order_receipts')->insertOrIgnore([
            'order_id'     => 1,
            'number'       => '2C21-ATA-0001',
            'sum'          => 51900,
            'date'         => now(),
            'author_id'    => 1,
            'client_name'  => 'Denuimrea Companiei S.R.L',
            'client_idno'  => '1290902334543',
            'cci_info'     => $cciInfo,
            'services'     => $services,
            'guaranty_sum' => 50000
        ]);
    }
}

