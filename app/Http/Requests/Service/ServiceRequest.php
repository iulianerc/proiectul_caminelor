<?php

namespace App\Http\Requests\Service;

use App\Http\Requests\BasicRequest;

class ServiceRequest extends BasicRequest
{
    protected array $rules = [
        'alias'          => 'required|string|min:2|max:100',
        'name_en'        => 'required|string|min:2',
        'name_ro'        => 'required|string|min:2',
        'name_ru'        => 'required|string|min:2',
        'values'         => 'nullable|array',
        'values.*.min'   => 'required|integer',
        'values.*.max'   => 'required|integer',
        'values.*.value' => 'required|numeric',
    ];
}
