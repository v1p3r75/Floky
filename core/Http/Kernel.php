<?php

namespace Floky\Http;

use Floky\Application;
use Floky\Exceptions\NotFoundException;
use Floky\Http\Requests\Request;
use Floky\Http\Responses\Response;

class Kernel
{

    protected array $routesGroup = ['web', 'api'];

    protected array $routesGroupConfiguration = [

        "api" => [

            ''
        ]
    ];

    protected array $middlewares = [];


    protected array $middlewaresByRoute = [

        "web" => [],
        "api" => [],
    ];

    protected array $middlewaresAlias = [];


    public function getAllMiddlewares(): array
    {
        return $this->middlewares;
    }

    public function getMiddleware(string $name) {

        if (! isset($this->middlewaresAlias[$name])) {

            throw new NotFoundException("'$name' Middleware was not found !");
        }

        return $this->middlewaresAlias[$name];
    }

    public function getMiddlewaresByRoute(string $routeGroupName): array | NotFoundException
    {

        if (! isset($this->middlewaresByRoute[$routeGroupName])) {

            throw new NotFoundException("'$routeGroupName' does not exist");
        }

        return $this->middlewaresByRoute[$routeGroupName];
    }

    public function getRoutesGroup(): array
    {

        return $this->routesGroup;
    }

}