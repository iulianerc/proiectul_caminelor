<?php

namespace App\Http\Requests\OrderGuarantee;

use App\Http\Requests\BasicRequest;

class OrderGuaranteeRequest extends BasicRequest
{
    protected array $rules = [
        'client_id'      => ['required', 'exists:clients,id'],
        'order_id'       => ['required', 'exists:orders,id'],
        'sum'            => ['required', 'numeric', 'min:0.1', 'max:10000000'],
        'type'           => ['required', 'in:bank_deposit,guaranty_letter'],
        'status'         => ['required', 'in:new,confirmed,canceled'],
        'proof_document' => ['file', 'max:10000'],
        'file_name'       => ['string']
    ];
}
