<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BasicRequest;

class ResetPasswordRequest extends BasicRequest
{
    protected array $rules
        = [
            'password' => 'required|string|confirmed',
            'token'    => 'required|string'
        ];
}
