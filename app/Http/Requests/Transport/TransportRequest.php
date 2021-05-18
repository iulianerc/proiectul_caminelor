<?php


namespace App\Http\Requests\Transport;

use App\Http\Requests\BasicRequest;

class TransportRequest extends BasicRequest
{

    protected array $rules = [
        'name_ro'         => 'required|string|min:3|max:100|unique:transports,name_ro',
        'name_en'         => 'required|string|min:3|max:100|unique:transports,name_en',
        'name_ru'         => 'required|string|min:3|max:100|unique:transports,name_ru',
    ];
    protected bool $ignorable = true;

    protected string $routeParameter = 'transport';
}
