<?php

namespace App\Http\Controllers;

use BlakvGhost\PHPValidator\Validator;
use Floky\Facades\Email;
use Floky\Http\Controllers\Controller;
use Floky\Http\Requests\Request;

class WelcomeController extends Controller
{

    private $rules = [
        'email' =>'required|email',
        'username' =>'required',
    ];

    public function index(Request $request, Email $mail, $id) {

        echo "Welcome to floky ";
    }
    
    public function validator() {

        return view('php-validator');
    }
    
    public function validate(Request $request) {
        $validate = new Validator($request->all());
        return dd();
    }
}