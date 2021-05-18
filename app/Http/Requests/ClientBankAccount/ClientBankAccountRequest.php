<?php


namespace App\Http\Requests\ClientBankAccount;

use App\Http\Requests\BasicRequest;

class ClientBankAccountRequest extends BasicRequest
{
    protected array $rules = [
        'bank_id' => 'required|numeric',
        'client_id' => 'numeric',
        'account' => 'required|string|min:3|max:255'
    ];
}
