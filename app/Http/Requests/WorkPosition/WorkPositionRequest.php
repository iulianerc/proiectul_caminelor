<?php


namespace App\Http\Requests\WorkPosition;


use App\Http\Requests\BasicRequest;

class WorkPositionRequest extends BasicRequest
{
    protected array $rules = [
        'name'       => 'required|string|min:2|max:255',
    ];

    protected string $routeParameter = 'work_positions';
}

