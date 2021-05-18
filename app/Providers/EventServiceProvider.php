<?php

namespace App\Providers;

use App\Events\Income\Details\LastIncomeDetailsHandler;
use App\Events\Warehouse\Consignment\ConsignmentHandler;
use App\Listeners\LastIncome;
use App\Listeners\OperationCreated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class               => [
            SendEmailVerificationNotification::class,
        ],
        ConsignmentHandler::class       => [
            OperationCreated::class
        ],
        LastIncomeDetailsHandler::class => [
            LastIncome::class,
        ]
    ];

    public function boot()
    {
        parent::boot();

        //
    }
}
