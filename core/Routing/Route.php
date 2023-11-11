<?php

namespace Floky\Routing;

use Closure;
use Floky\Exceptions\NotFoundException;
use Floky\Exceptions\ParseErrorException;
use Floky\Http\Requests\Request;

class Route
{

    private ?Route $instance = null;

    private static array $routes = [];

    public static array $verbs = ['GET', 'HEAD', 'OPTIONS', 'POST', 'PUT', 'PATCH', 'DELETE'];

    public function __construct()
    {

        $this->getInstance();
    }

    public function getInstance()
    {

        if (! $this->instance) {

            $this->instance = $this;
        }

        return $this->instance;
    }

    private static function methodIsCorrect(string $method = ''): bool
    {

        return in_array(strtoupper($method), self::$verbs);
    }

    public static function get(string $uri, $callback)
    {

        return self::add($uri, ['GET', 'HEAD'], $callback);


    }
    public static function post(string $uri, $callback)
    {

        return self::add($uri, ['POST'], $callback);

    }
    public static function put(string $uri, $callback)
    {

        return self::add($uri, ['PUT'], $callback);

    }
    public static function patch(string $uri, $callback)
    {

        return self::add($uri, ['PATCH'], $callback);

    }
    public static function delete(string $uri, $callback)
    {

        return self::add($uri, ['DELETE'], $callback);

    }

    public static function match(array $methods, string $uri, $callback)
    {

        return self::add($uri, $methods, $callback);

    }


    private static function add(string $uri, array $method, Closure | callable | array $callback)
    {

        self::$routes[] = [$uri => ['methods' => $method, 'callback' => $callback]];

    }

    public static function dispatch(Request $request): void
    {

        $method = $request->getMethod();

        if (!self::methodIsCorrect($method)) {

            throw new ParseErrorException('forMethod');
        }

        dump(self::$routes);

        // throw new NotFoundException('forRoute');
    }

    public static function getAll(): array {

        return self::$routes;
    }
}
