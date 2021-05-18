<?php

namespace App\Http\Requests\Good;

use App\Http\Requests\BasicRequest;

class GoodRequest extends BasicRequest
{
    protected array $rules = [
        'code'    => 'required|string|min:3|max:50',
        'name_ro' => 'required|string|min:3|max:100',
        'name_ru' => 'required|string|min:3|max:100',
        'name_en' => 'required|string|min:3|max:100',
    ];
}
