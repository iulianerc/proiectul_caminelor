<?php

namespace App\Http\Resources\User;

use App\Http\Resources\BaseResource;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class UserResource
 * @package App\Http\Resources\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phones
 * @property string $position_name
 * @property Collection contacts
 * @method contacts()
 */
class UserResource extends BaseResource
{
    protected function fields (): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'email'         => $this->email,
            'phones'        => $this->getContacts(),
            'position_name' => $this->position_name,
        ];
    }

    protected function getContacts (): string
    {
        return $this
            ->contacts
            ->where('type', 'phone')
            ->implode('value', ',');
    }
}
