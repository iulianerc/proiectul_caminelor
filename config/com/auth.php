<?php

return [
    'registration'                   => [
        'enable'     => env('COM_REGISTRATION_ENABLE', true),
        'auth_after' => env('COM_REGISTRATION_AUTH_AFTER', true),
        'activated'  => env('COM_REGISTRATION_ACTIVATE_ACCOUNT', false),
    ],
    'reset_password_token_minutes'   => 15,
    'account_activate_token_minutes' => 15,
    'password_expires_days'          => 60,
];
