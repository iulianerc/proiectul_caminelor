<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BasicRequest;

class UserEditRequest extends BasicRequest
{
    protected array $rules = [
        'name'                  => 'required|string|min:2',
        'email'                 => 'required|email|unique:users,email',
        'phones'                 =>'required|array',
        'avatar' => 'file'
    ];

    protected bool $ignorable = true;

    protected string $routeParameter = 'user';
}

