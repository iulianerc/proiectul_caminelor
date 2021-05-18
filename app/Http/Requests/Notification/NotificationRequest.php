<?php


namespace App\Http\Requests\Notification;


use App\Http\Requests\BasicRequest;

class NotificationRequest extends BasicRequest
{
    protected array $rules = [
        'receivers' => 'required',
        'message'   => 'required|string',
        'subject'   => 'string',
    ];
}