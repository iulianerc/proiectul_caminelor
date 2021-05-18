<?php

namespace App\Http\Resources\Contact;

use App\Http\Resources\BaseResource;

class ContactResource extends BaseResource
{
    protected function fields(): array
    {
        return [
            'contact_type' => $this->contact_type,
            'value'        => $this->value,
        ];
    }
}
