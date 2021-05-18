<?php


namespace App\Http\Resources\Employee;


use App\Http\Resources\BaseResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

/**
 * Class EmployeeEditResource
 * @package App\Http\Resources\Employee
 *
 * @property int $id
 * @property mixed name
 * @property mixed is_active
 * @property mixed phones
 * @property mixed idnp
 * @property mixed email
 * @property mixed gender
 * @property mixed birthdate
 * @property mixed user
 * @property mixed file
 *
 * @method Builder subdivisions()
 * @method Builder work_positions()
 * @method folder()
 */
class EmployeeEditResource extends BaseResource
{
    protected function fields(): array
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'phones'         => $this->phones,
            'email'          => $this->email,
            'idnp'           => $this->idnp,
            'gender'         => $this->gender,
            'birthdate'      => $this->birthdate,
            'is_active'      => $this->is_active,
            'user'           => $this->when($this->user, [
                'id'   => optional($this->user)->id,
                'name' => optional($this->user)->name
            ]),
            'signature'      => $this->when($this->file, [
                'name' => optional($this->file)->original_name,
                'url'  => Storage::url($this->folder() . '/' . optional($this->file)->saved_name),
            ]),
//            'subdivisions'        => $this->prepareSubdivisions(),
            'work_positions' => $this->prepareWorkPositions(),
        ];
    }


//    public function prepareSubdivisions(): array
//    {
//        return $this
//            ->subdivisions()
//            ->pluck('subdivisions.id')
//            ->all();
//    }

    public function prepareWorkPositions(): array
    {
        return $this
            ->work_positions()
            ->pluck('work_positions.id')
            ->all();
    }

}
