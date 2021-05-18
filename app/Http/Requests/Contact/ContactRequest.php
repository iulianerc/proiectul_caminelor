<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\BasicRequest;

class ContactRequest extends BasicRequest
{
    protected array $rules = [
        'contact_type' => 'required|string|in:email,phone',
        'value'        => 'required|string|min:5|max:255',
    ];
}




