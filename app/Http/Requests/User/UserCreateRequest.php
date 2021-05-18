<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BasicRequest;

/**
 * Class UserCreateRequest
 * @package App\Http\Requests\User
 *
 * @property  string $name
 * @property  string $email
 * @property  string $phones
 * @property  string $password
 * @property  string $password_confirmation
 * @property  string $position_id
 */
class UserCreateRequest extends BasicRequest
{
    protected array $rules = [
        'name'                  => 'required|string|min:2',
        'email'                 => 'required|email|unique:users,email',
        'phones'                => 'required|array',
        'password'              => 'required|confirmed',
        'password_confirmation' => 'required',
        'position_id'           => 'required',
        'avatar' => 'file',
    ];

}

