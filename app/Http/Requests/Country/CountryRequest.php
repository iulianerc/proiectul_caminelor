<?php


namespace App\Http\Requests\Country;

use App\Http\Requests\BasicRequest;

class CountryRequest extends BasicRequest
{
    protected array $rules = [
        'name'         => 'required|string|min:3|max:100|unique:countries,name',
        'code'         => 'required|string|min:2|max:3|unique:countries,code',
    ];
    protected bool $ignorable = true;

    protected string $routeParameter = 'country';
}
