<?php

use App\Http\Controllers\WelcomeController;
use Floky\Http\Requests\Request;
use Floky\Routing\Route;

Route::get('/', function(Request $request) {

    return view('welcome', ['name' => 'Floky']);

})->name('home');

Route::get('/contact/{id}', [WelcomeController::class, 'index'])->name('mouse');
