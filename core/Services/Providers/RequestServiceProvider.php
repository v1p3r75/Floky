<?php

namespace Floky\Services\Providers;

use Floky\Http\Requests\Request;
use Floky\Providers\ServiceInterface;

class RequestServiceProvider implements ServiceInterface
{

    public function register() {

        return Request::getInstance();
    }
    
}