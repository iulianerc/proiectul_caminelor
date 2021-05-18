<?php

namespace App\Http\Resources\Bank;

use App\Http\Resources\BaseResource;

class BankResource extends BaseResource
{
    protected function fields(): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'code'       => $this->code,
        ];
    }
}
