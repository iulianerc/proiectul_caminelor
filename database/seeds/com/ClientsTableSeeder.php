<?php

namespace seeds\com;

use App\Models\Client\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    private string $table = 'clients';

    public function run()
    {
        factory(Client::class, 10)->create();
    }

}
