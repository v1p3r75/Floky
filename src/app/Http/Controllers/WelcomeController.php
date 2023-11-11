<?php

namespace App\Http\Controllers;
use Floky\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index($contact) {

        echo "Welcome to floky " . $contact;
    }
}