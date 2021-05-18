<?php

namespace App\Http\Requests\User\Password;

use App\Http\Requests\BasicRequest;

class ChangePasswordRequest extends BasicRequest
{
    protected array $rules = ['password' => 'required|confirmed'];

}

