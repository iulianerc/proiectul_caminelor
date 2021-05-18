<?php



namespace App\Http\Resources\Transport;


use App\Http\Resources\BaseResource;

class TransportResource extends BaseResource
{
    protected function fields(): array
    {
        return [
            'id'      => $this->id,
            'name_ro' => $this->name_ro,
            'name_en' => $this->name_en,
            'name_ru' => $this->name_ru
        ];
    }
}
