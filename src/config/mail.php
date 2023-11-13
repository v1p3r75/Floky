<?php

return [
    
    'host' => env('EMAIL_HOST'),

    'username' => env('EMAIL_HOST_USER'),

    'password' => env('EMAIL_HOST_PASSWORD'),

    'from' => env('DEFAULT_FROM_EMAIL'),

    'encryption' => env('EMAIL_ENCRYPTION'),

    'port' => env('EMAIL_PORT'),
];