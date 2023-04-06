<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

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

        // 'user' => [
        //     'driver' => 'database',
        //     'table' => 'user',
        // ],
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
