<?php

namespace App\Http\Controllers;

use BlakvGhost\PHPValidator\Rules\RuleInterface;
use BlakvGhost\PHPValidator\Validator;
use Floky\Facades\Email;
use Floky\Http\Controllers\Controller;
use Floky\Http\Requests\Request;

class WelcomeController extends Controller
{


    public function index(Request $request, Email $mail, $id) {

        echo "Welcome to floky ";
    }
    
    public function validator() {

        return view('php-validator');
    }
    
    public function validate(Request $request) {
        $rules = [
            'email' =>'required|string|max_length:200',
            'username' =>'required|max_length:100',
            'password' => ['required','max_length:200', new SameRule()],
        ];

        $validate = new Validator($request->all(), $rules);

        if (!$validate->isValid()) {
            return dd($validate->getErrors());
        }
        return dd($validate->isValid());
    }
}

class SameRule implements RuleInterface
{
    protected $field;

    public function __construct(protected array $parameters = [])
    {
        
    }

    public function passes(string $field, $value, array $data): bool
    {
        $this->field = $field;

        return dd($data);
    }

    public function message(): string
    {
        return "";
    }
}