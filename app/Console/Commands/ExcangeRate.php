<?php

namespace App\Console\Commands;

use App\Repositories\ExchangeRate\ExchangeRateRepository;
use Illuminate\Console\Command;

class ExcangeRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:ExcangeRate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse bnm.md and update Excange Rate';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        (new ExchangeRateRepository)->updateCurrentMonth();
        return 0;
    }
}
