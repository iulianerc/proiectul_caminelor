<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BasicRequest;

class AuthLoginRequest extends BasicRequest
{
    protected array $rules
        = [
            'email'    => 'required|email',
            'password' => 'required',
        ];
}
