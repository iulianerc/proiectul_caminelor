<?php

namespace App\Http\Requests\Hostel;

use App\Http\Requests\BasicRequest;

class HostelRequest extends BasicRequest
{
    protected array $rules = [
            'name' => ['required', 'string', 'min:3', 'max:100']
        ];

    protected bool $ignorable = true;

    protected string $routeParameter = 'role';
}
