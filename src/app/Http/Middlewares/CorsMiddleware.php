<?php

namespace App\Http\Middlewares;
use Floky\Http\Middlewares\MiddlewareInterface;
use Floky\Http\Requests\Request;

class CorsMiddleware implements MiddlewareInterface
{
    public function handle(Request $request): Request {

        $config = config('cors');

        $request->header()->set('Access-Control-Allow-Origin', implode(',', $config['allowed_origins']));
        $request->header()->set('Access-Control-Allow-Methods', implode(',', $config['allowed_methods']));
        $request->header()->set('Access-Control-Allow-Headers', implode(',', $config['allowed_headers']));
        $request->header()->set('Access-Control-Expose-Headers', implode(',', $config['exposed_headers']));
        $request->header()->set('Access-Control-Max-Age', $config['max_age']);
        $request->header()->set('Access-Control-Allow-Credentials:', $config['supports_credentials'] ? 'true' : 'false');
        
        return $request;
    }
}