<?php

namespace Floky\Http\Middelwares;

use Floky\Http\Requests\Request;
use System\Http\Response;

interface MiddlewareInterface
{

    public function handle(Request $request, Response $response, \Closure $next);
    
}