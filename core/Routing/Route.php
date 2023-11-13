<?php

namespace Floky\Routing;

use App\Http\Kernel;
use Closure;
use Floky\Application;
use Floky\Exceptions\NotFoundException;
use Floky\Exceptions\ParseErrorException;
use Floky\Http\Middlewares\Middlewares;
use Floky\Http\Requests\Request;

class Route
{

    use Middlewares;

    private static array $routes = [];

    private static string $defaultMethod = 'index';

    public static array $verbs = ['GET', 'HEAD', 'OPTIONS', 'POST', 'PUT', 'PATCH', 'DELETE'];


    private static function methodIsCorrect(string | array $method = ''): bool
    {
        if (is_array($method)) {

            foreach($method as $value) {

                if (! in_array(strtoupper($value), self::$verbs)) {
                    return false;
                }
            }
            return true;
        }

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

    public static function options(string $uri, $callback)
    {

        return self::add($uri, ['OPTIONS'], $callback);
    }

    public static function match(array $methods, string $uri, $callback)
    {

        return self::add($uri, $methods, $callback);
    }

    public static function any(string $uri, $callback)
    {

        return self::add($uri, self::$routes, $callback);
    }


    private static function add(string $uri, array $method, Closure | callable | array $callback)
    {

        if (!self::methodIsCorrect($method)) {

            throw new ParseErrorException("Route does not support " . implode(",", $method) . " method");
        }

        $uri = self::format_uri($uri);

        self::$routes[] = ['uri' => $uri, 'methods' => $method, 'callback' => $callback];

        return new static;
    }

    public static function dispatch(Request $request)
    {

        $method = $request->getMethod();

        $current_uri = self::format_uri($request->getUri());

        // if (!self::methodIsCorrect($method)) {

        //     throw new ParseErrorException("Router does not support '$method'  method");
        // }

        foreach (self::$routes as $route) {

            $current_route = $route['uri'];

            $routeRegex = "@^" . preg_replace_callback("/{(\w+)(:[^}]+)?}/", fn ($m) => isset($m[2]) ? "({$m[2]})" : "(\w+)", $current_route) . "(\\?.*)?$@";

            if (preg_match_all($routeRegex, $current_uri, $matches)) {

                $route_methods = $route['methods'];

                $route_callback = $route['callback'];

                if (!in_array($method, $route_methods)) { // Bad route method

                    throw new ParseErrorException("The '" . $route['uri']. "' route does not support the '$method' method but: " . implode(",", $route_methods) );
                }

                $params = [];

                for ($i = 1; $i < count($matches); $i++) {
                    $params[] = $matches[$i][0]; // List of parameters that will parse to function

                }

                if(isset($route['middlewares'])) {

                    $route_middlewares = self::getMiddlewareArray($route['middlewares']);

                    self::runMiddlewares($route_middlewares, $request);

                }

                return self::runCallback($route_callback, $params);

            }
        }

        throw new NotFoundException('Page Not found', 404);
    }

    public static function runCallback(array | Closure | callable $callback, array $params = []) {

        $app = Application::getInstance();

        if (is_array($callback)) { 

            $controller = $app->services()->get($callback[0]);

            $method = $callback[1] ?? self::$defaultMethod;

            $resolved_method = $app->services()->getMethod($controller, $method, $params); // Get class & dependencies

            return $app->services()->runMethod($resolved_method);

        } else if (is_callable($callback)) {

            $resolved_callback = $app->services()->resolveFunction($callback, $params);
            
            return call_user_func_array($resolved_callback[0], $resolved_callback[1]);
        }
    }

    public static function middlewares(array $middlewares = [])
    {
        
        $route_index = self::getCurrentRoute();

        self::addRouteData($route_index, 'middlewares', $middlewares);

        return new static;
    }

    public static function name(string $name)
    {
        foreach(self::$routes as $route) {

            if(isset($route["name"]) && $route["name"] == $name) {

                $found = $route['uri'] == "" ? '/' : $route['uri'];
                throw new ParseErrorException("'$name' is already used by '$found'" );
            }
        }

        $route_index = self::getCurrentRoute();

        self::addRouteData($route_index, 'name', $name);

        return new static;
    }

    private static function format_uri(string $uri) {

        return trim($uri, "/");
    }

    public static function getAll(): array
    {
        return self::$routes;
    }

    private static function getCurrentRoute() {

        $route = end(self::$routes);
        $position = array_keys(self::$routes, $route);
        
        return implode(', ', $position);
    }

    private static function addRouteData(int $index, string $key, $payload)
    {

        self::$routes[$index][$key] = $payload;

        return true;
    }

    public static function getRouteByName(string $name) {

        foreach(self::$routes as $route) {

            if (isset($route['name']) && $route['name'] == $name) {

                return $route;
            }
        }
        
        return null;
    }

}
