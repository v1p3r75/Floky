<?php

namespace Floky\Http\Middlewares;

use Floky\Http\Requests\Request;

trait Middlewares
{

    public function runMiddlewares(array $middlewares, Request $request): Request {

        if (count($middlewares) > 0) {

            $currentMiddleware = new $middlewares[0];

            $currentRequest = $currentMiddleware->handle($request);

            $this->runMiddlewares(array_slice($middlewares, 1), $currentRequest);
        }

        return $currentRequest ?? $request;

    }
}