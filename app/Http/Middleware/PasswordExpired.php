<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PasswordExpired
{
    protected array $excluded = ['v1.oauth.update_password'];

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     *
     * @return mixed
     * @throws Exception
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || $request->routeIs($this->excluded)) {
            return $next($request);
        }

        $user = $request->user();
        $passwordChangedAt = new Carbon($user->password_changed_at ?: $user->created_at);

        if ($user->password_expired ||
            Carbon::now()->diffInDays($passwordChangedAt) >= config('com.auth.password_expires_days')

        ) {
            return response()->json(['message' => 'Your password has expired, please change it.'], 426);
        }

        return $next($request);
    }
}
