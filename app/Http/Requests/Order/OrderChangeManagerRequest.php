<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\BasicRequest;

class OrderChangeManagerRequest extends BasicRequest
{
    protected array $rules = [
        'order_id'   => 'required|integer|exists:orders,id',
        'manager_id' => 'required|integer|exists:users,id',
    ];
}
