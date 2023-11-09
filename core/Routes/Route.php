<?php

namespace Floky\Routes;

class Route
{

    private ?Route $instance = null;

    private array $routes = [];

    public $methodsAllowed = ['get', 'post', 'put', 'update', 'delete'];

    public function __construct()
    {

        // $this->getInstance();
    }

    public function getInstance()
    {

        // if ($this->instance == null) {

        //     $this->instance = new Route();
        // }

        return $this->instance;
    }

    private function methodIsCorrect(string $method = ''): bool
    {

        return in_array(strtolower($method), $this->methodsAllowed);
    }

    public static function get(string $uri, callable | array $callback): self
    {

        $self = new static;

        $self->add($uri, 'get', $callback);

        return $self;
    }
    public static function post(string $uri, callable | array $callback): self
    {

        $self = new static;

        $self->add($uri, 'post', $callback);

        return $self;
    }
    public static function put(string $uri, callable | array $callback): self
    {

        $self = new static;

        $self->add($uri, 'put', $callback);

        return $self;
    }
    public static function patch(string $uri, callable | array $callback): self
    {

        $self = new static;

        $self->add($uri, 'patch', $callback);

        return $self;
    }
    public static function delete(string $uri, callable | array $callback): self
    {

        $self = new static;

        $self->add($uri, 'patch', $callback);

        return $self;
    }


    private function add(string $uri, string $method, $callback)
    {

        if ($this->methodIsCorrect($method)) {

            $this->routes[$uri] = ['method' => $method, 'callback' => $callback];
        }

        #TODO: return parse error exception

    }

    public function run(string $currentURI = "")
    {

        $method = trim(strtolower($_SERVER['REQUEST_METHOD']), '/');

        if (!$this->methodIsCorrect($method)) {

            #TODO: return not found exception
        }

        var_dump($this->routes);

        #TODO: return not found exception
    }

    public static function getAll() {

        return (new static)->routes;
    }
}
