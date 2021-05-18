<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BasicRequest;

class AuthRegisterRequest extends BasicRequest
{
    protected array $rules
        = [
            'name'       => 'required',
            'email'      => 'required|email|unique:users',
            'password'   => 'required',
            'c_password' => 'required|same:password',
        ];
}
