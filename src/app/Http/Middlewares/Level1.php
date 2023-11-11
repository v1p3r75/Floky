<?php

namespace App\Middlewares;
use Floky\Http\Middelwares\MiddlewareInterface;
use Floky\Http\Requests\Request;
use Floky\Http\Responses\Response;

class Level1 implements MiddlewareInterface
{
    public function handle(Request $request, \Closure $next) {
        
        var_dump($request->fromGet());
    }
}