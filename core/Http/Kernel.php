<?php

namespace Floky\Http;

use Floky\Application;
use Floky\Exceptions\NotFoundException;
use Floky\Http\Requests\Request;
use Floky\Http\Responses\Response;

class HttpKernel
{

    protected array $middlewares = [];


    protected array $middlewaresByRoute = [

        "web" => [

        ],

        "api" => [

        ]
    ];

    protected array $middlewaresAlias = [];


    public function getAllMiddlewares(): array
    {
        return $this->middlewares;
    }

    public function getMiddleware(string $name) {

        if (! isset($this->middlewaresAlias[$name])) {

            throw new NotFoundException('forMiddleware');
        }

        return $this->middlewaresAlias[$name];
    }

    public function getMiddlewaresByRoute(string $routeGroupName): array | NotFoundException
    {

        if (! isset($this->middlewaresByRoute[$routeGroupName])) {

            throw new NotFoundException('forRouteGroup');
        }

        return $this->middlewaresByRoute[$routeGroupName];
    }


    public function runAppMiddlewares() {

        foreach ($this->middlewares as $middleware) {

            $class = new $middleware;

            return $class->handle(new Request, function() {});
        }
    }
    public function runMiddleware(string $middleware, ?string $group = null) {

        // $middleware = $this->getMiddleware($middleware);

        // $app = Application::getInstance();
        
        // $class = new $middleware;

        // return $class->handle(

        //     $app->getRequest(),
        //     $app->getResponse(),

        // );

    }
}