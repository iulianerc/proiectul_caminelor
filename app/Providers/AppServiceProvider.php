<?php

namespace App\Providers;

use App\Builders\Table\Table;
use App\Http\Validators\IDNPFormat;
use App\Models\Warehouse\Operation\CustomerReturn;
use App\Models\Warehouse\Operation\Import;
use App\Models\Warehouse\Operation\Income;
use App\Models\Warehouse\Operation\Outcome;
use App\Models\Warehouse\Operation\Production;
use App\Models\Warehouse\Operation\ProviderReturn;
use App\Models\Warehouse\Operation\Sale;
use App\Models\Warehouse\Operation\WriteOff;
use App\Services\Routing\ResourceRegistrar;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @param UrlGenerator $url
     *
     * @return void
     */
    public function boot(UrlGenerator $url): void
    {
        if (config('app.env') !== 'local') {
            $url->forceScheme('https');
        }

        Passport::tokensExpireIn(now()->addDays(1));
        Passport::refreshTokensExpireIn(now()->addDays(14));

        $registrar = new ResourceRegistrar($this->app['router']);

        $this->app->bind(\Illuminate\Routing\ResourceRegistrar::class, static function () use ($registrar) {
            return $registrar;
        });

        $this->app->singleton(Table::class, fn($app) => new Table());

        Relation::morphMap([
            'income'          => Income::class,
            'import'          => Import::class,
            'customer_return' => CustomerReturn::class,
            'write_off'        => WriteOff::class,
            'sale'            => Sale::class,
            'provider_return' => ProviderReturn::class,
            'outcome'         => Outcome::class,
            'production'      => Production::class
        ]);

        Validator::extend('valid_idnp', IDNPFormat::class);

    }
}
