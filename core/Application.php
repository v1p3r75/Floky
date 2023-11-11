<?php

namespace Floky;

use Floky\Container\Container;
use Floky\Http\Requests\Request;
use Floky\Http\Responses\Response;
use Floky\Routing\Route;

class Application 
{

    public array $config = [];

    public Container $container;

    public Request $request;

    public Route $routing;

    public array $groupGroup = ["api", "web"];

    public static ?Application $instance = null;

    private function __construct(public $root_dir = null) {

        $this->request = Request::getInstance();;
        $this->container = Container::getInstance();;

    }

    public static function getInstance(string $root_dir = null) {

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
    public function run() {

        require(__DIR__ . "/helpers.php"); // load function helpers 
        require($this->root_dir . "/routes/web.php");
        require($this->root_dir . "/routes/api.php");

        return Route::dispatch($this->request);
    }

}