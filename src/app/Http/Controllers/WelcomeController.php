<?php

namespace App\Http\Controllers;
use Floky\Http\Controllers\Controller;
use Floky\Http\Requests\Request;

class WelcomeController extends Controller
{

    public function __construct(public Request $request) {}

    public function index() {

        dump($this->request);
        echo "Welcome to floky ";
    }
}