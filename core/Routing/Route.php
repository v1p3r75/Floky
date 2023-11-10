<?php

namespace Floky\Routing;

use ArrayObject;
use Floky\Exceptions\NotFoundException;
use Floky\Exceptions\ParseErrorException;

class Route
{

    private ?Route $instance = null;

    private array $routes = [];

    public $methodsAllowed = ['get', 'post', 'put', 'patch', 'delete'];

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

    private function methodIsCorrect(string $method = ''): bool
    {

        return in_array(strtolower($method), $this->methodsAllowed);
    }

    public function get(string $uri, callable | array $callback): self
    {

        $this->add($uri, 'get', $callback);

        return $this;

    }
    public function post(string $uri, callable | array $callback): self
    {

        $this->add($uri, 'post', $callback);

        return $this;
    }
    public function put(string $uri, callable | array $callback): self
    {

        $this->add($uri, 'put', $callback);

        return $this;
    }
    public function patch(string $uri, callable | array $callback): self
    {

        $this->add($uri, 'patch', $callback);

        return $this;
    }
    public function delete(string $uri, callable | array $callback): self
    {

        $this->add($uri, 'delete', $callback);

        return $this;
    }


    private function add(string $uri, string $method, $callback)
    {

        if (! $this->methodIsCorrect($method)) {

            throw new ParseErrorException('forMethod');
        }

        $this->routes[] = [$uri => ['method' => $method, 'callback' => $callback]];

    }

    public function dispatch(string $currentURI = ""): void
    {

        $method = strtolower($_SERVER['REQUEST_METHOD']);

        if (!$this->methodIsCorrect($method)) {

            throw new ParseErrorException('forMethod');
        }

        dump($this->routes);

        // throw new NotFoundException('forRoute');
    }

    public function getAll(): array {

        return $this->routes;
    }
}
