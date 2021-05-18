<?php

namespace App\Http\Resources\ExchangeRate;

use App\Http\Resources\BaseResource;

class ExchangeRateResource extends BaseResource
{
    protected function fields(): array
    {
        return [
            'value' => $this->value
        ];
    }
}
