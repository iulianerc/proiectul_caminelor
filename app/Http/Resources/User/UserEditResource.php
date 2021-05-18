<?php


namespace App\Http\Resources\User;


use App\Http\Resources\BaseResource;
use Illuminate\Support\Facades\Storage;

class UserEditResource extends BaseResource
{

    protected function fields (): array
    {
        $contacts = $this->contacts()->where('type', 'phone')->get();
        $avatar = $this->avatar;
        $savedName = '';
        $url = '';
        if ($avatar) {
            $savedName = $avatar->file->saved_name;
            $url = Storage::url($avatar->folder() . '/' . $savedName);
        }
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'email'         => $this->email,
            'position_name' => $this->position->alias,
            'position_id'   => $this->position->id,
            'phones'        => $contacts->pluck('value'),
            'avatar'        => $this->when($avatar, [
                'name' => $savedName,
                'url'  => $url,
            ])
        ];
    }
}
