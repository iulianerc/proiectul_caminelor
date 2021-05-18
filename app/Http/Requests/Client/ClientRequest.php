<?php


namespace App\Http\Requests\Client;

use App\Http\Requests\BasicRequest;

class ClientRequest extends BasicRequest
{
    protected array $rules = [
        'type' => 'required|string|in:juridical,physical',
        'idno' => 'required|string|size:13',
        'name' => 'required|string|min:3|max:100',
        'administrator_name' => 'required-if:type,juridical|string|min:3|max:100',
        'vat_code' => 'required-if:type,juridical|string|min:3|max:100',
        'identity_card' => 'required-if:type,physical|string|min:10|max:30',
        'identity_card_date' => 'required-if:type,physical|date',
        'identity_card_issued' => 'required-if:type,physical|string|min:3|max:256',
        'banks' => 'array',
        'contacts' => 'array',
        'address_ro' => 'required|string|min:10|max:100',
        'address_en' => 'required|string|min:10|max:100',
        'address_ru' => 'required|string|min:10|max:100',
        'address_home' => 'required_if:type,physical|string|min:10|max:100'
    ];
}
