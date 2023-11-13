<?php

use Floky\Application;
use Floky\Http\Responses\Response;
use Floky\Routing\Route;

/**
 * Secure data to prevent cross-site scripting (XSS) attacks, supporting strings and arrays.
 *
 * @param array|string $data Data to be secured, can be a string or an array.
 * @return array|string Secured data.
 */

function secure(array | string $data) {

    if (is_array($data)) {

        foreach ($data as $key => $value) {
            
            $data[$key] = secure($value);
        }

    } else {

        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }

    return $data;
}


/**
 * Render a view template using Blade with optional data to pass to the view.
 *
 * @param string $name The name of the view template.
 * @param array $data Optional data to pass to the view.
 * @return void
 */

function view(string $name, $data = [])
{

    $blade = Application::getBlade();

    echo $blade->run($name, $data);

}

/**
 * Render a resource view template using Blade with optional data to pass to the view.
 *
 * @param string $name The name of the resource view template.
 * @param array $data Optional data to pass to the view.
 * @return void
 */
function view_resource(string $name, $data = [])
{

    $blade = Application::getBlade(true);
    echo $blade->run($name, $data);

}

/**
 * Create a new HTTP response object.
 *
 * @return Response A new HTTP response object.
 */
function response() 
{
    return new Response();
}


/**
 * Retrieve the URI associated with a named route.
 *
 * @param string $name The name of the route.
 * @return string|null The URI of the named route, or `null` if the route does not exist.
 */
function route(string $name): string | null
{
    $route = Route::getRouteByName($name);
    
    return $route ? $route["uri"] : null;
    
}


/**
 * Get the value of an environment variable or return a default value.
 *
 * @param string $key The name of the environment variable.
 * @param string|null $default (Optional) The default value to return if the environment variable is not set.
 * @return string|null The value of the environment variable or the default value if the variable is not set.
 */
function env(string $key, string $default = null) {
    return isset($_ENV[$key]) ? $_ENV[$key] : $default;
}

/**
 * Load a configuration file by name and return its contents.
 *
 * @param string $file The name of the configuration file (without the .php extension).
 * @return array The configuration data from the file or an empty array if the file doesn't exist.
 */
function config(string $file) {
    $file = $file . ".php";
    $config_files = get_directory_files(app_config_path());

    if (array_key_exists($file, $config_files)) {
        return require $config_files[$file];
    }

    return [];
}

/**
 * Get an array of files in a directory.
 *
 * @param string $dir The path to the directory to scan for files.
 * @return array An associative array where keys are file names and values are their full paths.
 */
function get_directory_files(string $dir): array {
    $files = [];
    $content = scandir($dir);

    if ($content) {
        foreach($content as $value) {
            $path = $dir . $value;
            if(is_file($path)) {
                $files[$value] = $path;
            }
        }
    }

    return $files;
}

function app_root_path(string $path = "") {

    return Application::getAppDirectory() . $path;

}

function app_path(string $path = "") {

    return app_root_path("/app/$path");
}

function app_http_path(string $path = "") {

    return app_path("Http/$path");
}

function app_services_path(string $path = "") {

    return app_path("Services/$path");

}

function app_view_path(string $path = "") {

    return app_root_path("/views/$path");

}

function app_resources_path(string $path = "") {

    return app_root_path("/resources/$path");

}

function app_config_path(string $path = "") {

    return app_root_path("/config/$path");

}

function app_cache_path(string $path = "") {

    return app_root_path("/cache/$path");

}

function app_storage_path(string $path = "") {

    return app_root_path("/storage/$path");

}

function app_routes_path(string $path = "") {

    return app_root_path("/routes/$path");
}

function core_root_path(string $path = '') {

    return Application::$core_dir . $path;
}

function core_services_path(string $path = "") {

    return core_root_path("/Services/$path");
}

