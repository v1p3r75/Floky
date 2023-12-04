<?php

namespace App\Http\Middlewares;
use Floky\Http\Middlewares\Internal\BlockRequestMiddleware;

class PreventRequestMaintenanceMiddleware extends BlockRequestMiddleware
{

    protected array $except = [

    ];
}