<?php

namespace App\Http;

use App\Http\Middlewares\FirstMiddleware;
use App\Http\Middlewares\SecondMiddleware;
use Floky\Http\Kernel as HttpKernel;

return new class extends HttpKernel
{

    protected array $routesGroup = ['web', 'api', 'others'];

    
    protected array $middlewares = [

        \App\Http\Middlewares\CorsMiddleware::class,
    ];

    protected array $middlewaresByRoute = [

        "api" => [

        ],

        "web" => [

        ],
    ];

    protected array $middlewaresAlias = [

        'first' => FirstMiddleware::class,
        'second' => SecondMiddleware::class,
        'cors' => \App\Http\Middlewares\CorsMiddleware::class,
    ];

};