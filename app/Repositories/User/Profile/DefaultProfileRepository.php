<?php


namespace App\Repositories\User\Profile;


use App\Models\User\Profile\DefaultProfile;
use App\Models\User\User;
use App\Repositories\Repository;

class DefaultProfileRepository extends Repository
{
    protected function modelName(): string
    {
        return DefaultProfile::class;
    }

    protected User $user;

    public function edit(User $user, array $data)
    {

        $profile = $this->prepareProfileArray($data);

        return $user->profile()->updateOrCreate(['user_id' => $user->id], $profile);
    }

    public function prepareProfileArray(array $data): array
    {

        //@todo написать метод для всего что ниже
        if (isset($data['address'])) {
            $data = array_merge($data, $data['address']);
            unset($data['address']);
        }

        if (isset($data['state'])) {
            $data['state_id'] = $data['state'];
            unset($data['state']);
        }

        return $data;
    }

}
