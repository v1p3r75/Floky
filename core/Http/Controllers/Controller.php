<?php

namespace Floky\Http\Controllers;

use Floky\Http\Requests\Request;
use Floky\Http\Responses\Response;

class Controller
{

    public Request $request;
    public Response $response;

    public function __construct() {

        $this->request = Request::getInstance();
        $this->response = new Response;
    }
}