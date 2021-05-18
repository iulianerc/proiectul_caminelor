<?php


namespace App\Broadcasting;


use App\Models\Chat\Room;
use App\Models\User\User;

class RoomChannel
{
    public function join(User $user, Room $room): bool
    {
        return $room->isMember($user) || $room->typeOf('public');
    }
}
