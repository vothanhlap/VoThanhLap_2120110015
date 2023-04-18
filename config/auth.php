<?php
return [
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'user',
    ],
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'user',
        ],
    ],
    'providers' => [
        'user' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],
    'passwords' => [
        'user' => [
            'provider' => 'vtl_user',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
    'password_timeout' => 10800,
];
