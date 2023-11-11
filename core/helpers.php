<?php

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

// function response(int $code = 200): \Floky\Http\Responses\Response 
// {
//     return new \Floky\Http\Responses\Response($code);
// }
