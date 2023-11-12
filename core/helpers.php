<?php

use eftec\bladeone\BladeOne;
use Floky\Application;

function app_root_path(): string {

    return Application::getAppDirectory();

}

function app_routes_path(): string {

    return app_root_path() . "/routes/";
}

function app_http_path(): string {

    return app_root_path() . "/app/Http/";
}

function app_services_path(): string {

    return app_root_path() . "/app/Services/";

}

function app_view_path(): string {

    return app_root_path() . "/views";

}

function app_cache_path(): string {

    return app_root_path() . "/cache";

}

function secure($data) {

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

// function response(int $code = 200): \Floky\Http\Responses\Response 
// {
//     return new \Floky\Http\Responses\Response($code);
// }
