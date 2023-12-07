<?php

return [

    'name' => env('APP_NAME', 'Floky'),

    'author' => env('APP_AUTHOR', 'Floky'),

    'language' => "en",

    'environment' => env('APP_ENV'),

    'maintenance' => env('APP_STATE', 'up') === 'down' ? true : false,

    'providers' => [

        'routing' => [

            'attributes_in_controllers' => true,
        ],

    ]
];