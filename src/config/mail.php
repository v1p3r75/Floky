<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Email Host
    |--------------------------------------------------------------------------
    |
    | The hostname of the email server.
    |
    */
    'host' => env('EMAIL_HOST'),

    /*
    |--------------------------------------------------------------------------
    | Email Username
    |--------------------------------------------------------------------------
    |
    | The username for authenticating with the email server.
    |
    */
    'username' => env('EMAIL_HOST_USER'),

    /*
    |--------------------------------------------------------------------------
    | Email Password
    |--------------------------------------------------------------------------
    |
    | The password for authenticating with the email server.
    |
    */
    'password' => env('EMAIL_HOST_PASSWORD'),

    /*
    |--------------------------------------------------------------------------
    | Default "From" Address
    |--------------------------------------------------------------------------
    |
    | The default email address to use for the "From" header in outgoing emails.
    |
    */
    'from' => env('DEFAULT_FROM_EMAIL'),

    /*
    |--------------------------------------------------------------------------
    | Email Encryption
    |--------------------------------------------------------------------------
    |
    | The encryption protocol to use when connecting to the email server.
    |
    */
    'encryption' => env('EMAIL_ENCRYPTION'),

    /*
    |--------------------------------------------------------------------------
    | Email Port
    |--------------------------------------------------------------------------
    |
    | The port to use when connecting to the email server.
    |
    */
    'port' => env('EMAIL_PORT'),
];
