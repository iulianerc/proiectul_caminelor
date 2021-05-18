<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(): void
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes(): void
    {
        Route::prefix('api/v1/orders/{order?}/pdf')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));

        Route::prefix('webhooks')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(static function () {
                foreach (File::allFiles(base_path('routes/webhooks')) as $file) {
                    require $file->getPathname();
                }
            });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix('api/v1')
            ->name('v1.')
            ->middleware(['api'])
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));

        Route::prefix('api/v1')
            ->name('v1.')
            ->middleware(['api', 'auth:api'])
            ->group(base_path('routes/authorized.php'));

        Route::prefix('api/v1')
            ->name('v1.')
            ->middleware(['api', 'auth:api', 'password.expired', 'redirect', 'permissions'])
            ->namespace('App\Http\Controllers\v1')
            ->group(static function () {
                foreach (File::allFiles(base_path('routes/v1')) as $file) {
                    require $file->getPathname();
                }
            });
    }
}
