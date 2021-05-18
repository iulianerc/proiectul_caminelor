<?php


namespace App\Http\Requests\Client;

use App\Http\Requests\BasicRequest;

class ClientLiveSearchRequest extends BasicRequest
{
    protected array $rules = [
        'searchValue' => 'required|string'
    ];
}
