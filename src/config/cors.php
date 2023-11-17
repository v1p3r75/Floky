<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | List of origins that are allowed to perform cross-origin requests.
    | Values can be an array of origins or '*' to allow any origin.
    |
    */
    'allowed_origins' => ['http://localhost', 'https://example.com'],

    /*
    |--------------------------------------------------------------------------
    | Allowed HTTP Methods
    |--------------------------------------------------------------------------
    |
    | HTTP methods that are allowed on cross-origin requests. For example,
    | GET, POST, PUT, DELETE, etc.
    |
    */
    'allowed_methods' => ['GET', 'POST', 'PATCH', 'PUT', 'DELETE'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Headers
    |--------------------------------------------------------------------------
    |
    | List of HTTP headers allowed in a cross-origin request.
    |
    */
    'allowed_headers' => ['Content-Type', 'Authorization'],

    /*
    |--------------------------------------------------------------------------
    | Exposed Headers
    |--------------------------------------------------------------------------
    |
    | List of HTTP headers that can be exposed to the browser.
    |
    */
    'exposed_headers' => [],

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | Duration in seconds for which the results of a preflight request
    | can be cached.
    |
    */
    'max_age' => 0,

    /*
    |--------------------------------------------------------------------------
    | Supports Credentials
    |--------------------------------------------------------------------------
    |
    | Indicates whether the browser should include credentials (like cookies)
    | with cross-origin requests.
    |
    */
    'supports_credentials' => false,
];
