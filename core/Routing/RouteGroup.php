<?php

namespace Floky\Routing;

trait RouteGroup
{

    private array $group = [];

    public static function group(callable $callback)
    {

        call_user_func($callback);
        return new static;
    }

}