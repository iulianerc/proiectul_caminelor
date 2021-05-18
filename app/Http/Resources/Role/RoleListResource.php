<?php

namespace App\Http\Resources\Role;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class RoleListResource
 * @package App\Http\Resources\Role
 *
 * @property int $id
 * @property string $name
 *
 */
class RoleListResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'value' => $this->id,
            'text'  => $this->name,
        ];
    }
}
