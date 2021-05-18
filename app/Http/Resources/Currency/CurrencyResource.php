<?php

namespace App\Http\Resources\Currency;

use App\Http\Resources\BaseResource;

class CurrencyResource extends BaseResource
{
    protected function fields(): array
    {
        return [
            'value' => $this->id,
            'text' => $this->name
        ];
    }
}
