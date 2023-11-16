<?php

namespace App\Http\Controllers;

use Floky\Http\Controllers\Controller;
use Floky\Http\Requests\Request;

class WelcomeController extends Controller
{


    public function index(Request $request, $id) {

        echo "Welcome to floky ";
    }
    
    public function validate(Request $request) {

        $rules = [
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required'
        ];

        // $validation = $request->validate($rules);

        $validation = validate($request->all(), $rules); // with helper

        if (!$validation->isValid()) {

            return dump($validation->getErrors());
        }

        return dump('Validated');
    }

}