<?php

namespace App\Http\Middlewares;
use Floky\Http\Middlewares\MiddlewareInterface;
use Floky\Http\Requests\Request;

class SecondMiddleware implements MiddlewareInterface
{
    public function handle(Request $request): Request {
                
        dump($request->header()->get('Authorization'));

        return $request;
    }
}