<?php

namespace Floky;

use Floky\Container\Container;
use Floky\Http\Requests\Request;
use Floky\Routing\Route;

class Application 
{

    public array $config = [];

    public Container $container;

    public Request $request;

    public Route $routing;

    public function __construct(public string $root_dir) {

        $this->container = new Container();
        $this->request = new Request();
    }

    /**
     * Save all applications services (middlewares, consoles, etc)
     */
    public function save(array $config = []) {

        $this->config = $config;

    }

    public function getService($name) {

        return $this->container->get($name);
    }

    public function saveService($name, $new_instance) {

        return $this->container->set($name, $new_instance);
    }

    /**
     * Start a new application
     */
    public function run(): void {

        require(__DIR__ . "/helpers.php"); // load function helpers 
        require($this->root_dir . "/routes/web.php");
        require($this->root_dir . "/routes/api.php");
        Route::dispatch($this->request);

    }

}