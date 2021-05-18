<?php


namespace App\Broadcasting;


use App\Jobs\CheckNotifications;
use App\Models\User\User;

class UserChannel
{
    public function join(User $user, string $uuid): bool
    {
        CheckNotifications::dispatch($user);

        return $user->uuid === $uuid;
    }
}
