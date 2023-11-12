<?php

namespace Floky\Services\Internal;

use Floky\Http\Requests\Request;
use Floky\Services\ServiceProvider;

class RequestService extends ServiceProvider
{

    public function register()  {

        $this->app->services()->set(Request::class, function() {

            return Request::getInstance();
        });
    }
    
}