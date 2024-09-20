<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel Webpay v1
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Routes
    |--------------------------------------------------------------------------
    |
    | You can set the routes for Laravel Webpay
    | Prefix and name, are available
    |
    */

    'prefix' => env('WEBPAY_PREFIX', 'webpay'),
    'name' => env('WEBPAY_NAME', 'webpay.'),

    /*
    |--------------------------------------------------------------------------
    | Environment
    |--------------------------------------------------------------------------
    |
    | You can set the environment for Laravel Webpay
    | Commerce code, secret key, and debug, are available
    | Please take care with the debug option
    |
    */

    'in_production' => env('WEBPAY_IN_PRODUCTION', false),
    'commerce_code' => env('WEBPAY_COMMERCE_CODE'),
    'secret_key' => env('WEBPAY_SECRET_KEY'),
    'debug' => env('WEBPAY_DEBUG', false),

    // Optional fields

    'texts' => [
        'creating' => [
            'content' => 'Redirecting...',
            'title' => 'Redirecting to Webpay',
        ],
        'retry' => [
            'content' => 'Please try again',
            'title' => 'Retry payment',
        ],
    ],
];
