<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Localization
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->header('X-localization');

        if (empty($locale)) {
            $locale = Config::get('app.fallback_locale');
        }

        if (!in_array($locale, Config::get('app.locales'), true)) {
            throw new NotFoundHttpException("Not found locale: {$locale}");
        }

        App::setLocale($locale);

        return $next($request);
    }
}
