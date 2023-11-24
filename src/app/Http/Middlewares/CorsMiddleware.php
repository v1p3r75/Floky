<?php

namespace App\Http\Middlewares;
use Floky\Http\Middlewares\Internal\HandleCorsMiddleware;

class CorsMiddleware extends HandleCorsMiddleware
{

    protected array $except = [

    ];
}