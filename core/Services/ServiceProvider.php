<?php

namespace Floky\Services;

use Closure;
use Floky\Application;

abstract class ServiceProvider
{

    protected Application $app;

    public function __construct()
    {
        $this->app = Application::getInstance();
    }

    abstract public function register();


}