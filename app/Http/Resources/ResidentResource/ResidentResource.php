<?php


namespace App\Http\Resources\ResidentResource;


use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ResidentResource
 * @package App\Http\Resources\ResidentResource
 * @property int $id
 * @property string $idnp
 * @property string $name
 * @property string $phones
 * @property string $email
 */

class ResidentResource extends JsonResource
{
    protected function fields(): array
    {

        return [
            'id'     => $this->id,
            'idnp'   => $this->idnp,
            'name'   => $this->name,
            'phones' => $this->phones,
            'email'  => $this->email,
        ];
    }
}
