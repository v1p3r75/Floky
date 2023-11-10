<?php
use Floky\Exceptions\NotFoundException;
use System\Http\Response;

function dump(...$vars): void
{
    echo "<pre>";
    var_dump($vars);
    echo "</pre>";

}
/**
 * Dump vars and exit
 * @param $vars
 */
function dumpExit(...$vars): void
{
    echo "<pre>";
    var_dump($vars);
    echo "</pre>";
	exit();
}


/**
 * @param $var
 *
 */
function secure($var) {
    if(is_array($var)) return $var;

    return htmlspecialchars($var, ENT_QUOTES);
}

function json(array $data) {

    return Response::json($data);
}
