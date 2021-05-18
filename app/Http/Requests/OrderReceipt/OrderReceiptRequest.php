<?php

namespace App\Http\Requests\OrderReceipt;

use App\Http\Requests\BasicRequest;

/**
 * Class OrderReceiptRequest
 * @package App\Http\Requests\OrderReceipt
 * @property int $order_id
 * @property boolean $is_preview
 */

class OrderReceiptRequest extends BasicRequest
{
    protected array $rules = [
        'order_id'    => ['required', 'exists:orders,id'],
        'is_preview' => ['nullable', 'in:true,false']
    ];
}
