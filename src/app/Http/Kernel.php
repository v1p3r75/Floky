<?php

namespace App\Http;

use App\Http\Middlewares\FirstMiddleware;
use App\Http\Middlewares\SecondMiddleware;
use Floky\Http\Kernel as HttpKernel;

return new class extends HttpKernel
{

    protected array $middlewares = [

        FirstMiddleware::class,
        SecondMiddleware::class,
    ];

    protected array $middlewaresByRoute = [

        "api" => [
            FirstMiddleware::class,
        ],

        "web" => [
            FirstMiddleware::class
        ],
    ];

    protected array $middlewaresAlias = [


    ];

};