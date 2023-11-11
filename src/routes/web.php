<?php

use Floky\Routing\Route;

Route::get('/', function() {
    echo "home";
});

Route::get('/test/{id}', function($id) {

    echo "hello " . $id;
});