<?php

return [

    'name' => env('APP_NAME', 'Floky'),

    'author' => env('APP_AUTHOR', 'Floky'),

    'environment' => env('APP_ENV'),

    'maintenance' => env('APP_STATE', 'up') === 'down' ? true : false,
];