<?php

namespace App\Http\Requests\PurposesOfUse;

use App\Http\Requests\BasicRequest;

class PurposesOfUseRequest extends BasicRequest
{
    protected array $rules = [
        'name' => 'required|string|min:5|max:255',
        'description_ro' => 'required|string|min:10|max:255',
        'description_en' => 'required|string|min:10|max:255',
        'description_ru' => 'required|string|min:10|max:255',
    ];
}
