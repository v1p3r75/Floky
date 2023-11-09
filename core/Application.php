<?php

namespace Floky;

use Floky\Routes\Route;

class Application 
{

    public array $config = [];

    public function __construct(public string $root_dir) {}

    /**
     * Save all applications services (middlewares, consoles, etc)
     */
    public function save(array $config = []) {

        $this->config = $config;

    }
    public function run() {

        require(__DIR__ . "/helpers.php");

        Route::get("/", function() { echo "test"; });
        Route::get("/test", function() { echo "test"; });
        Route::get("/service", function() { echo "test"; });

        var_dump(Route::getAll());
    }

}