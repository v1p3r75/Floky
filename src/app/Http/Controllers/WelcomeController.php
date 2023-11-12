<?php

namespace App\Http\Controllers;
use Floky\Http\Controllers\Controller;
use Floky\Http\Requests\Request;
use Floky\Http\Responses\Response;

class WelcomeController extends Controller
{

    public function index(Request $request, $id) {

        echo "Welcome to floky " . $id;
    }
}