<?php


namespace App\Http\Requests\SystemVariableBook;

use App\Http\Requests\BasicRequest;

class SystemVariableBookRequest extends BasicRequest
{
    protected array $rules = [
        'name' => 'required|string|min:2|max:255',
        'alias' => 'required|string|min:2|max:255',
        'value_ro' => 'required|string|min:2|max:255',
        'value_en' => 'required|string|min:2|max:255',
        'value_ru' => 'required|string|min:2|max:255',
    ];
}
