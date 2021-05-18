<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordCreateRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\User\PasswordReset;
use App\Models\User\User;
use App\Notifications\User\PasswordResetRequest;
use App\Notifications\User\PasswordResetSuccess;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{

    public function create(ResetPasswordCreateRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return not_found([
                'message' => "We can't find a user with that e-mail address."
            ]);
        }

        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => Str::random(60)
            ]
        );

        if ($user && $passwordReset) {
            $user->notify(new PasswordResetRequest($passwordReset->token));
        }

        return ok([
            'message' => 'We have e-mailed your password reset link!'
        ]);
    }

    public function find($token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();
        if (!$passwordReset) {
            return not_found([
                'message' => 'This password reset token is invalid.'
            ]);
        }

        if (\carbon($passwordReset->updated_at)->addMinutes(config('com.auth.reset_password_token_minutes'))->isPast()) {
            $passwordReset->delete();

            return not_found([
                'message' => 'This password reset token is invalid.'
            ]);
        }

        return ok();
    }

    public function reset(ResetPasswordRequest $request)
    {
        $passwordReset = PasswordReset::where('token', $request->token)->first();

        if (!$passwordReset) {
            return not_found([
                'message' => 'This password reset token is invalid.'
            ]);
        }

        $user = User::where('email', $passwordReset->email)->first();
        if (!$user) {
            return not_found([
                'message' => 'This password reset token is invalid.'
            ]);
        }

        $user->password = $request->password;
        $user->password_changed_at = \carbon()->nowWithSameTz();
        $user->save();
        $passwordReset->delete();
        $user->notify(new PasswordResetSuccess());

        return ok();
    }
}
