<?php

namespace App\Http\Requests\Resident;

use App\Http\Requests\BasicRequest;

class ResidentRequest extends BasicRequest
{
    protected array $rules = [
        'phones' => ['required', 'string'],
        'name' => ['string', 'min:3', 'max:100'],
        'email' => ['required', 'string', 'email:rfc,dns'],
        'idnp' => ['required', 'string', 'size:13']
    ];

    protected bool $ignorable = true;

    protected string $routeParameter = 'role';
}
