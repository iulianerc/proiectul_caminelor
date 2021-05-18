<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BasicRequest;

class ResetPasswordCreateRequest extends BasicRequest
{
    protected array $rules
        = [
            'email' => 'required|string|email',
        ];
}
