<?php

namespace Floky\Http\Middlewares;

use Floky\Http\Requests\Request;
use Floky\Http\Responses\Response;

interface MiddlewareInterface
{

    public function handle(Request $request): Request;
    
}