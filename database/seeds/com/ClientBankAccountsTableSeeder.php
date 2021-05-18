<?php

namespace seeds\com;

use App\Models\Client\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientBankAccountsTableSeeder extends Seeder
{
    private string $table = 'client_bank_accounts';

    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $account = [
                'bank_id' => 1,
                'account' => 'Account data'
            ];
            $account['client_id'] = $i;
            DB::table($this->table)->insertOrIgnore($account);
        }
    }
}
