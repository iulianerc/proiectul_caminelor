<?php


namespace App\Http\Resources\Country;


use App\Http\Resources\BaseResource;

class CountryResource extends BaseResource
{

    protected function fields(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'accept_ata' => $this->accept_ata
        ];
    }
}
