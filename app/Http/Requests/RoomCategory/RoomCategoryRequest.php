<?php

namespace App\Http\Requests\RoomCategory;

use App\Http\Requests\BasicRequest;

class RoomCategoryRequest extends BasicRequest
{
    protected array $rules = [
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'residents_max_count' => ['required', 'integer']
        ];

    protected bool $ignorable = true;

    protected string $routeParameter = 'role';
}
