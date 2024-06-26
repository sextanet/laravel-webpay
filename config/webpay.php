<?php

return [
    // Environment
    'in_production' => env('WEBPAY_IN_PRODUCTION', false),
    'commerce_code' => env('WEBPAY_COMMERCE_CODE'),
    'secret_key' => env('WEBPAY_SECRET_KEY'),
    'debug' => env('WEBPAY_DEBUG', false),

    // Optional
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
