<?php

use App\Http\Controllers\WelcomeController;
use Floky\Http\Requests\Request;
use Floky\Routing\Route;

Route::get('/', function() {

    return view('welcome', ['name' => 'Floky'])
});

Route::get('/contact', [WelcomeController::class, 'index']);
