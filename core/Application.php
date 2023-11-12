<?php

namespace Floky;

use eftec\bladeone\BladeOne;
use Floky\Container\Container;
use Floky\Http\Middlewares\Middlewares;
use Floky\Http\Requests\Request;
use Floky\Routing\Route;

class Application 
{

    use Middlewares;

    public Container $container;

    public Request $request;

    public array $routesGroup = ["api", "web"];

    public static string $root_dir;

    public static ?Application $instance = null;

    private function __construct(string $root_dir) {

        self::$root_dir = $root_dir;
        set_exception_handler([$this, 'handleException']);
        set_error_handler([$this, 'handleException']);
        $this->request = Request::getInstance();
        $this->container = Container::getInstance();

    }

    public static function getInstance(?string $root_dir = null) {

        if(!self::$instance) {

            self::$instance = new self($root_dir);
        }

        return self::$instance;
    }

    /**
     * Save all applications services (middlewares, consoles, etc)
     */
    public function saveAppServices() {

        //TODO: Register app services
    }

    public function services(): Container {

        return $this->container;
    }

    /**
     * Start a new application
     */
    public function run () {

        require(__DIR__ . "/Helpers.php"); // load function helpers

        // Run all app middlewares before run current route

        $appHttpKernel = app_http_path() . "Kernel.php";

        $httpKernel = require($appHttpKernel);

        $request = $this->runMiddlewares($httpKernel->getAllMiddlewares(), $this->request);

        return $this->dispatch($request);
    }

    public function dispatch(Request $request) {

        $this->loadAppRoutes();

        return Route::dispatch($request);
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

    public static function getBlade(): BladeOne {

        $blade = new BladeOne(app_view_path() , app_cache_path(), BladeOne::MODE_DEBUG); // MODE_DEBUG allows to pinpoint troubles.

        return $blade;
    }

    public function handleException ( $err) {

        $traces = $this->getCodePreview($err->getTrace());

        $data = [
            'name' => $err::class,
            'file' => $err->getFile(),
            'line' => $err->getLine(),
            'message' => $err->getMessage(),
            'code' => $err->getCode(),
            'previews' => $traces,
        ];
        
        view('errors', $data);
    }

    private function getCodePreview(array $traceback) {

        $hl = new \Highlight\Highlighter();

        $traces = [];

        foreach($traceback as $trace) {

            $code = $this->getPreview($trace);

            $content = $hl->highlight('php', $code);
            $content->filename = $trace['file'];

            $traces[] = $content;
        }

        return $traces;
    }

    private function getPreview($trace) {

        $lines = file($trace['file']);
        $start = max(0, $trace['line'] - 5);
        $end = min(count($lines), $trace['line'] + 5);
        $codePreview = array_slice($lines, $start, $end - $start);

        return implode("", $codePreview);
    }
}