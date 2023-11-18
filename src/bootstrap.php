<?php

session_start();

use Floky\Application;

$app = Application::getInstance(__DIR__);

return $app->run();
