<?php

namespace seeds\com;

use App\Repositories\ExchangeRate\ExchangeRateRepository;
use Illuminate\Database\Seeder;

class ExchangeRateSeeder extends Seeder
{
    private string $table = 'exchange_rates';

    public function run()
    {
        (new ExchangeRateRepository)->updateCurrentMonth();
    }
}
