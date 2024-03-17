<?php

namespace App\Http;

use Floky\Http\Kernel as HttpKernel;

return new class extends HttpKernel
{

    protected array $routesGroup = ['web', 'api'];

    
    protected array $middlewares = [

        \App\Http\Middlewares\CorsMiddleware::class,
        \App\Http\Middlewares\PreventRequestMiddleware::class,
        \App\Http\Middlewares\CheckTokenMiddleware::class,
    ];

    protected array $middlewaresByRoute = [

        "api" => [

        ],

        "web" => [

        ],
    ];

    protected array $middlewaresAlias = [
        
        'cors' => \App\Http\Middlewares\CorsMiddleware::class,
        'csrf_token' => \App\Http\Middlewares\CheckTokenMiddleware::class,
        'prevent_request' => \App\Http\Middlewares\PreventRequestMaintenanceMiddleware::class,
    ];

};