<?php

use Floky\Application;

function app_root_path(): string {

    return Application::getAppDirectory();

}

function app_routes_path(): string {

    return app_root_path() . "/routes/";
}
function secure($var) {

    if(is_array($var)) return $var;

    return htmlspecialchars($var, ENT_QUOTES);
}

// function response(int $code = 200): \Floky\Http\Responses\Response 
// {
//     return new \Floky\Http\Responses\Response($code);
// }
