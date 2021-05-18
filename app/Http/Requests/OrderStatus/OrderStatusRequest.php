<?php

namespace App\Http\Requests\OrderStatus;

use App\Http\Requests\BasicRequest;

class OrderStatusRequest extends BasicRequest
{
    protected array $rules = [
        'name' => 'required|min:3|max:20',
        'alias' => 'required|min:3|max:20',
        'color' => 'required|size:7'
    ];
}
