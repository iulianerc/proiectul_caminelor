<?php


namespace App\Http\Resources\PackingCategory;


use Illuminate\Http\Resources\Json\JsonResource;

class PackingCategoryListResource extends JsonResource
{
    public function toArray($request): array
    {
        $fields = [
            'id' => $this->id,
            'name' => $this->name,
            'name_ro' => $this->name_ro,
            'name_en' => $this->name_en,
            'name_ru' => $this->name_ru,
        ];
        return array_filter($fields, fn($field) => $field);
    }
}
