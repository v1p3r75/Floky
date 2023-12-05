<?php

namespace App\Http\Middlewares;
use Floky\Http\Middlewares\Internal\BlockRequestMiddleware;

class PreventRequestMiddleware extends BlockRequestMiddleware
{

    protected array $except = [

    ];
}