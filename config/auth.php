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
         'customer' => [
            'driver' => 'session',
            'provider' => 'customer',
        ],
    ],
    'providers' => [
        'user' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'customer' => [
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
        'customer' => [
            'provider' => 'customer',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
    'password_timeout' => 10800,
];
