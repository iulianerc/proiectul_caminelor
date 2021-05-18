<?php


namespace App\Http\Resources\Transport;


use App\Http\Resources\BaseResource;

class TransportListResource extends BaseResource
{
    public function fields(): array
    {
        $fields = [
            'id'      => $this->id,
            'name_ro' => $this->name_ro,
            'name_en' => $this->name_en,
            'name_ru' => $this->name_ru
        ];

        return array_filter($fields);
    }
}
