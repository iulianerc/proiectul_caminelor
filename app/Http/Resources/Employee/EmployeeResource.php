<?php


namespace App\Http\Resources\Employee;


use App\Http\Resources\BaseResource;
use Illuminate\Support\Facades\Storage;

/**
 * @property mixed file
 * @property mixed id
 * @property mixed name
 * @property mixed phones
 * @property mixed email
 * @property mixed idnp
 * @property mixed gender
 * @property mixed birthdate
 * @property mixed is_active
 * @property mixed user
 *
 * @method folder()
 */
class EmployeeResource extends BaseResource
{
    protected function fields(): array
    {
        $signature = $this->file;
        $url = Storage::url($this->folder() . '/' . optional($signature)->saved_name);

        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'phones'         => $this->phones,
            'email'          => $this->email,
            'idnp'           => $this->idnp,
            'gender'         => $this->gender,
            'birthdate'      => $this->birthdate,
            'is_active'      => $this->is_active,
            'user_name'      => $this->when($this->user !== null, optional($this->user)->name),
            'signature'      => $this->when($signature !== null, $url),
        ];
    }
}
