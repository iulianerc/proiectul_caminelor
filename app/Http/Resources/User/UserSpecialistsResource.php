<?php


namespace App\Http\Resources\User;


use App\Http\Resources\BaseResource;

/**
 * @property mixed id
 * @property mixed name
 * @property mixed email
 * @property mixed phones
 * @property mixed is_active
 */
class UserSpecialistsResource extends BaseResource
{

    protected function fields(): array
    {
        return [
            'id'                    => $this->id,
            'name'                  => $this->name,
            'email'                 => $this->email,
            'phones'                 => $this->phones,
            'is_active'             => $this->is_active
        ];
    }
}
