<?php

use App\Http\Controllers\WelcomeController;
use Floky\Http\Requests\Request;
use Floky\Routing\Route;

Route::get('/', function() {
   
    dump($_SERVER);
    echo "Welcome To Floky";
});

Route::get('/contact/{[A-Za-z]+}', [WelcomeController::class, 'index']);
