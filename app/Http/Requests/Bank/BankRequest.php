<?php

namespace App\Http\Requests\Bank;

use App\Http\Requests\BasicRequest;

class BankRequest extends BasicRequest
{
    protected array $rules = [
        'name' => 'required|string',
        'code' => 'required|string',
    ];
}
