<?php

use Floky\Application;
use Floky\Http\Responses\Response;

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

function app_cache_path(string $path = "") {

    return app_root_path("/cache/$path");

}

function app_storage_path(string $path = "") {

    return app_root_path("/storage/$path");

}

function app_routes_path() {

    return app_root_path() . "/routes/";
}

function core_root_path(string $path = '') {

    return Application::$core_dir . $path;
}

function core_services_path(string $path = "") {

    return core_root_path("/Services/$path");
}

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


function view(string $name, $data = [])
{

    $blade = Application::getBlade();

    echo $blade->run($name, $data);

}

function view_resource(string $name, $data = [])
{

    $blade = Application::getBlade(true);
    echo $blade->run($name, $data);

}


function response(int $code = 200) 
{
    return new Response();
}