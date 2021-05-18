<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderConfirmPaymentRequest extends FormRequest
{
    public function rules (): array
    {
        return [
            'tax_payed'      => 'required_without:guaranty_payed',
            'guaranty_payed' => 'required_without:tax_payed',
        ];
    }
}
