<?php

namespace Floky\Http\Middelwares;

use Floky\Http\Requests\Request;
use Floky\Http\Responses\Response;

interface MiddlewareInterface
{

    public function handle(Request $request, \Closure $next);
    
}