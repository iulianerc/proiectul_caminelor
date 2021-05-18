<?php


namespace App\Http\Requests\ListMethod;

use App\Http\Requests\BasicRequest;

class ListMethodRequest extends BasicRequest
{
    protected array $rules = [
        'fields' => 'array',
        'orderBy' => 'array'
    ];
}
