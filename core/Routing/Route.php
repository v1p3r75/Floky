<?php

namespace Floky\Routing;

use Closure;
use Floky\Exceptions\NotFoundException;
use Floky\Exceptions\ParseErrorException;
use Floky\Http\Requests\Request;

class Route
{

    private static array $routes = [];

    private static string $defaultMethod = 'index';

    public static array $verbs = ['GET', 'HEAD', 'OPTIONS', 'POST', 'PUT', 'PATCH', 'DELETE'];


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
        $uri = self::format_uri($uri);

        self::$routes[] = [$uri => ['methods' => $method, 'callback' => $callback]];
    }

    public static function dispatch(Request $request)
    {

        $method = $request->getMethod();

        $current_uri = self::format_uri($request->getUri());

        if (!self::methodIsCorrect($method)) {

            throw new ParseErrorException('forMethod');
        }

        foreach (self::$routes as $route) {

            $current_route = array_key_first($route);

            $routeRegex = "@^" . preg_replace_callback("/{(\w+)(:[^}]+)?}/", fn ($m) => isset($m[2]) ? "({$m[2]})" : "(\w+)", $current_route) . "$@";

            if (preg_match_all($routeRegex, $current_uri, $matches)) {

                $route_methods = $route[$current_route]['methods'];

                $route_callback = $route[$current_route]['callback'];

                if (!in_array($method, $route_methods)) { // Bad route method

                    throw new ParseErrorException('forBadMethod');
                }

                $params = [];

                for ($i = 1; $i < count($matches); $i++) {
                    $params[] = $matches[$i][0]; // List of parameters that will parse to function

                }

                return self::runCallback($route_callback, $params);

            }
        }

        throw new NotFoundException('forRoute');
    }

    public static function runCallback(array | Closure | callable $callback, array $params = []) {

        if (is_array($callback)) { 

            $controller = new $callback[0]();

            $method = $callback[1] ?? self::$defaultMethod;

            return call_user_func_array([$controller, $method], $params);

        } else if (is_callable($callback)) {

            return call_user_func_array($callback, $params);
        }
    }

    public static function format_uri(string $uri) {

        return trim($uri, "/");
    }

    public static function getAll(): array
    {

        return self::$routes;
    }

}
