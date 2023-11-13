<?php

namespace App\Http\Controllers;

use Floky\Facades\Email;
use Floky\Http\Controllers\Controller;
use Floky\Http\Requests\Request;

class WelcomeController extends Controller
{

    public function index(Request $request, Email $mail, $id) {

        echo "Welcome to floky " . $id;
    }
}