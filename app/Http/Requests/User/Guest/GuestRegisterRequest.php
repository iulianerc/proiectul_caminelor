<?php

namespace App\Http\Requests\User\Guest;

use App\Http\Requests\BasicRequest;

class GuestRegisterRequest extends BasicRequest
{
    protected array $rules = [
        'client_name' => 'required',
        'name'        => 'required|string|min:3',
        'email'       => 'required|email|unique:users,email',
        'password'    => 'required|confirmed',
    ];

}

