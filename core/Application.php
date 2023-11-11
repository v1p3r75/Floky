<?php

namespace Floky;

use Floky\Container\Container;
use Floky\Http\Middlewares\Middlewares;
use Floky\Http\Requests\Request;
use Floky\Routing\Route;

class Application 
{

    use Middlewares;

    public array $config = [];

    public Container $container;

    public Request $request;

    public Route $routing;

    public array $routesGroup = ["api", "web"];

    public static string $root_dir;

    public static ?Application $instance = null;

    private function __construct(string $root_dir) {

        self::$root_dir = $root_dir;
        $this->request = Request::getInstance();;
        $this->container = Container::getInstance();;

    }

    public static function getInstance(?string $root_dir) {

        if(!self::$instance) {

            self::$instance = new self($root_dir);
        }

        return self::$instance;
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
    public function run () {

        require(__DIR__ . "/Helpers.php"); // load function helpers

        // Run all app middlewares before run current route

        $appHttpKernel = app_http_path() . "Kernel.php";

        $httpKernel = require($appHttpKernel);

        $this->runMiddlewares($httpKernel->getAllMiddlewares(), Request::getInstance());

        return $this->dispatch();
    }

    public function dispatch() {

        $this->loadAppRoutes();

        return Route::dispatch($this->request);
    }

    
    public function loadAppRoutes(): void {

        $path = app_routes_path();

        foreach ($this->routesGroup as $group) {

            $group_file = $path . $group. ".php";

            if(file_exists($group_file)) {

                require_once $group_file;
            }
        }
        
    }

    public static function getAppDirectory() {

        return self::$root_dir;
    }
}