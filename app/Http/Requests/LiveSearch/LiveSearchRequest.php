<?php


namespace App\Http\Requests\LiveSearch;

use App\Http\Requests\BasicRequest;

class LiveSearchRequest extends BasicRequest
{
    protected array $rules = [
        'fields' => 'required|array',
        'fields.value' => 'required|string',
        'fields.text' => 'required|string',
        'route' => 'required|string',
        'filter' => 'required|array',
        'filter.*' => 'nullable|string|min:1'
    ];
}
