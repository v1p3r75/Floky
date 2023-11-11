<?php

function dump(...$vars): void
{
    echo "<pre>";
    var_dump($vars);
    echo "</pre>";

}

function dumpExit(...$vars): void
{
    echo "<pre>";
    var_dump($vars);
    echo "</pre>";
	exit();
}


function secure($var) {

    if(is_array($var)) return $var;

    return htmlspecialchars($var, ENT_QUOTES);
}

// function response(int $code = 200): \Floky\Http\Responses\Response 
// {
//     return new \Floky\Http\Responses\Response($code);
// }
