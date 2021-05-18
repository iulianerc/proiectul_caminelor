<?php


namespace App\Http\Resources\Country;


use App\Http\Resources\BaseResource;

class CountryListResource extends BaseResource
{

    protected function fields(): array
    {
        return [
            'value' => $this->id,
            'text' => $this->name,
        ];
    }
}
