<?php

namespace App\Http\Controllers;

use Floky\Http\Requests\Request;
use Floky\Routing\Attributes\Get;

class WelcomeController extends Controller
{

    #[Get('/', 'home')]
    public function index(Request $request) {

        return view('welcome');
    }

}