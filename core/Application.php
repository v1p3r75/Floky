<?php

namespace Floky;

use Floky\Routing\Route;

class Application 
{

    public array $config = [];

    public Route $routing;

    public function __construct(public string $root_dir) {

        $this->routing = new Route();
    }

    /**
     * Save all applications services (middlewares, consoles, etc)
     */
    public function save(array $config = []) {

        $this->config = $config;

    }

    /**
     * Start a new application
     */
    public function run(): void {

        require(__DIR__ . "/helpers.php");

        $route = new Route();

        $route2 = new Route();

        $route->get('test1', []);
        $route2->post('test2', []);
        $route->patch('test3', []);
        $route->put('test4', []);
        $route->delete('test5', []);

        $route->dispatch($_SERVER['REQUEST_URI']);

    }

}