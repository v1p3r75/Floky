<?php

namespace App\Http;

use App\Middlewares\Level1;
use Floky\Http\HttpKernel;

class Kernel extends HttpKernel
{

    protected array $middlewares = [

        Level1::class,
    ];

    protected array $middlewaresByRoute = [

    ];

    protected array $middlewaresAlias = [


    ];

}