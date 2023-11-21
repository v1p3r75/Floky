<?php

namespace App\Http\Middlewares;

use Exception;
use Floky\Facades\Security;
use Floky\Http\Middlewares\MiddlewareInterface;
use Floky\Http\Requests\Request;

class CSRFTokenMiddleware implements MiddlewareInterface
{
    public function handle(Request $request): Request {

        if ($request->isPost()) {

            if (! Security::checkToken($request->input('csrf_token'))) {

                 // TODO: render a 401 template instead of throw exception
                throw new Exception('Invalid CSRF token', 401);
            }
        }
        return $request;
    }
}