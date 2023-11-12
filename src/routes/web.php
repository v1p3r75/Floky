<?php

use App\Http\Controllers\WelcomeController;
use Floky\Http\Requests\Request;
use Floky\Routing\Route;

Route::get('/', function(Request $request) {

    dump($request->attr);
    return view('welcome', ['name' => 'Floky']);

})->name('home')->middlewares(['first', 'second']);

Route::get('/contact/{id}', [WelcomeController::class, 'index'])->name('mouse');
