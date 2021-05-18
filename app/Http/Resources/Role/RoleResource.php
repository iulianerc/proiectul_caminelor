<?php

namespace App\Http\Resources\Role;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class RoleListResource
 * @package App\Http\Resources\Role
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property string guard_name
 * @property string name_ro
 * @property string name_en
 * @property string name_ru
 *
 */
class RoleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'  => $this->id,
            'name' => $this->name,
            'name_ro' => $this->name_ro,
            'name_en' => $this->name_en,
            'name_ru' => $this->name_ru,
            'guard_name'  => $this->guard_name,
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
        ];
    }
}
