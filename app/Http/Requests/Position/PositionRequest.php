<?php

namespace App\Http\Requests\Position;

use App\Http\Requests\BasicRequest;

class PositionRequest extends BasicRequest
{
    protected array $rules
        = [
            'name' => 'required|string|min:2|max:255|unique:positions,name',
        ];
    protected bool $ignorable = true;

    protected string $routeParameter = 'position';

}
