<?php


namespace App\Channels;


use App\Events\Chat\SendMessage;
use App\Models\Chat\Message;
use App\Notifications\User\ChatNotification;

class ChatChannel
{
    public function send($notifiable, ChatNotification $notification): void
    {
        /** @var Message $message*/
        $message = $notification->toChat($notifiable);
        broadcast(new SendMessage($message))->toOthers();
    }
}
