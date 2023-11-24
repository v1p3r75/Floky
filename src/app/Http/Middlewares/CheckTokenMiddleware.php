<?php

namespace App\Http\Middlewares;

use Floky\Http\Middlewares\Internal\CSRFTokenMiddleware;

class CheckTokenMiddleware extends CSRFTokenMiddleware
{

    protected array $except = [
        
    ];
}