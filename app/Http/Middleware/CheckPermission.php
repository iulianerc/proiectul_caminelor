<?php

namespace App\Http\Middleware;

use App\Services\Permission\PermissionService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CheckPermission
{
    public function handle(Request $request, Closure $next)
    {
        if (env('CHECK_PERMISSIONS', true) && user()->cant(Route::currentRouteName())) {
            throw new AccessDeniedHttpException('Access Denied for route '.Route::currentRouteName(), null, 403);
        }

        return $next($request);
    }
}
