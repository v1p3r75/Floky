<?php

namespace Floky;

use Dotenv\Dotenv;
use eftec\bladeone\BladeOne;
use Error;
use ErrorException;
use Exception;
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

    public static string $core_dir;

    public static ?Application $instance = null;

    private function __construct(string $root_dir)
    {

        self::$root_dir = $root_dir;
        self::$core_dir = __DIR__;

        set_exception_handler([$this, 'handleException']);
        set_error_handler([$this, 'handleError']);

        $dotenv = Dotenv::createImmutable(dirname(self::$root_dir));
        $dotenv->safeLoad();

        $this->request = Request::getInstance();
        $this->container = Container::getInstance();

    }

    static function sendMail()
    {

        
    }

    public static function getInstance(?string $root_dir = null)
    {

        if (!self::$instance) {

            self::$instance = new self($root_dir);
        }

        return self::$instance;
    }

    /**
     * Save all applications services (middlewares, consoles, etc)
     */
    private function saveAppServices(array $services)
    {

        foreach ($services as $service) {

            (new $service)->register();
        }
    }

    public function services(): Container
    {

        return $this->container;
    }

    /**
     * Start a new application
     */
    public function run()
    {

        require(__DIR__ . "/Helpers.php"); // load function helpers

        $services = $this->getAllServices();

        $this->saveAppServices($services);

        // Run all app middlewares before run current route

        $httpKernel = self::getHttpKernel();

        $request = $this->runMiddlewares($httpKernel->getAllMiddlewares(), $this->request);

        return $this->dispatch($request);
    }


    private function dispatch(Request $request)
    {

        $this->loadAppRoutes();

        return Route::dispatch($request);
    }


    public function getAllServices(): array
    {

        $servicesKernelPath = core_services_path("Kernel.php");

        $appServicesPath = app_services_path("Kernel.php");

        $appServices = require($appServicesPath);

        $servicesKernel = require($servicesKernelPath);

        return [...$servicesKernel, ...$appServices];
    }

    public static function getHttpKernel()
    {
        $appHttpKernel = app_http_path("Kernel.php");

        $appHttpKernel = app_http_path("Kernel.php");

        $httpKernel = require($appHttpKernel);

        return $httpKernel;
    }

    private function loadAppRoutes(): void
    {

        $path = app_routes_path();

        foreach ($this->routesGroup as $group) {

            $group_file = $path . $group . ".php";

            if (file_exists($group_file)) {

                require_once $group_file;
            }
        }
    }

    public static function getAppDirectory()
    {

        return self::$root_dir;
    }

    public static function getBlade(bool $isResource = false): BladeOne
    {

        $path = $isResource ? app_resources_path() : app_view_path();

        $blade = new BladeOne($path, app_cache_path(), BladeOne::MODE_DEBUG); // MODE_DEBUG allows to pinpoint troubles.

        return $blade;
    }

    public function handleError(int $errno, string $errstr, string $errfile, int $errline): bool
    {
        if (!(error_reporting() & $errno)) {
            // This error code is not included in error_reporting, so let it fall
            // through to the standard PHP error handler
            return false;
        }

        throw new ErrorException(
            secure($errstr),
            $errno,
            E_ERROR,
            $errfile,
            $errline,
            null
        );
    }

    public function handleException(Exception | Error $err)
    {

        if ($err->getCode() === 404) {

            return view_resource('templates.404');
        }

        $traces = $this->getCodePreview($err->getTrace());

        $data = [
            'name' => $err::class,
            'file' => $err->getFile(),
            'line' => $err->getLine(),
            'message' => $err->getMessage(),
            'code' => $err->getCode(),
            'previews' => $traces,
        ];

        view_resource('templates.errors', $data);
    }

    private function getCodePreview(array $traceback)
    {

        $hl = new \Highlight\Highlighter();

        $traces = [];

        foreach ($traceback as $trace) {

            if ($code = $this->getPreview($trace)) {

                $content = $hl->highlight('php', $code);
                $content->filename = $trace['file'];

                $traces[] = $content;
            }
        }

        return $traces;
    }

    private function getPreview($trace)
    {

        if (!isset($trace["file"])) return false;
        $lines = file($trace['file']);
        $start = max(0, $trace['line'] - 5);
        $end = min(count($lines), $trace['line'] + 5);
        $codePreview = array_slice($lines, $start, $end - $start);

        return implode("", $codePreview);
    }
}
