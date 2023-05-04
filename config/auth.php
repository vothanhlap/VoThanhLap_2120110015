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
        'cus' => [
            'driver' => 'session',
            'provider' => 'custumer',
        ],
    ],
    'providers' => [
        'user' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'custumer' => [
            'driver' => 'eloquent',
            'model' => App\Models\Customer::class,
        ],
    ],
    'passwords' => [
        'user' => [
            'provider' => 'vtl_user',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'custumer' => [
            'provider' => 'vtl_custumer',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
    'password_timeout' => 10800,
];
