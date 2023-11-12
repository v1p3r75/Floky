<?php

use Floky\Application;
use Floky\Http\Responses\Response;

function app_root_path(): string {

    return Application::getAppDirectory();

}

function app_path(): string {

    return app_root_path() . '/app/';
}

function app_routes_path(): string {

    return app_root_path() . "/routes/";
}

function app_http_path(): string {

    return app_path() . "Http/";
}

function app_services_path(): string {

    return app_path() . "Services/";

}

function app_view_path(): string {

    return app_root_path() . "/views";

}

function app_resources_path(): string {

    return app_root_path() . "/resources";

}

function app_cache_path(): string {

    return app_root_path() . "/cache";

}

function app_storage_path(): string {

    return app_root_path() . "/storage";

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