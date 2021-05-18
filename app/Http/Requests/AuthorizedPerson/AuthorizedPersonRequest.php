<?php


namespace App\Http\Requests\AuthorizedPerson;

use App\Http\Requests\BasicRequest;

class AuthorizedPersonRequest extends BasicRequest
{
    protected array $rules = [
        'name_en'         => 'required|string|min:3|max:100|unique:authorized_persons,name_en',
        'name_ro'         => 'required|string|min:3|max:100|unique:authorized_persons,name_ro',
        'name_ru'         => 'required|string|min:3|max:100|unique:authorized_persons,name_ru',
    ];

    protected bool $ignorable = true;
    protected string $routeParameter = 'authorized_person';
}
