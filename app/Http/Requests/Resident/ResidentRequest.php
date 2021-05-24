<?php

namespace App\Http\Requests\Resident;

use App\Http\Requests\BasicRequest;

class ResidentRequest extends BasicRequest
{
    protected array $rules = [
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'phones' => ['required', 'string'],
            'email' => ['required', 'string', 'email:rfc,dns'],
            'idnp' => ['required', 'string', 'size:13']
        ];

    protected bool $ignorable = true;

    protected string $routeParameter = 'role';
}
