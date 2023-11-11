<?php

function secure($var) {

    if(is_array($var)) return $var;

    return htmlspecialchars($var, ENT_QUOTES);
}

// function response(int $code = 200): \Floky\Http\Responses\Response 
// {
//     return new \Floky\Http\Responses\Response($code);
// }
