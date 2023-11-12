<?php

namespace App\Http\Middlewares;
use Floky\Http\Middlewares\MiddlewareInterface;
use Floky\Http\Requests\Request;

class FirstMiddleware implements MiddlewareInterface
{
    public function handle(Request $request): Request {

        $request->attr = ['changed'];
        return $request;
    }
}