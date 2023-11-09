<?php

use Floky\Application;

$app = new Application(__DIR__);

$app->save([
    "consoles" => [],
    "middlewares" => [],
    "services" => [],
]);

return $app->run();
