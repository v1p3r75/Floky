<?php

namespace App\Http\Controllers;

use BlakvGhost\PHPValidator\Validator;
use Floky\Facades\Email;
use Floky\Http\Controllers\Controller;
use Floky\Http\Requests\Request;

class WelcomeController extends Controller
{

    private $rules = [
        'email' =>'required|string|max_length:200',
        'username' =>'required|max_length:100',
    ];

    public function index(Request $request, Email $mail, $id) {

        echo "Welcome to floky ";
    }
    
    public function validator() {

        return view('php-validator');
    }
    
    public function validate(Request $request) {
        $validate = new Validator($request->all(), $this->rules);

        if (!$validate->isValid()) {
            return dd($validate->getErrors());
        }
        return dd($validate->isValid());
    }
}