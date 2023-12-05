<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestCustomRequest;
use App\Http\Resources\TestResource;
use Floky\Http\Controllers\Controller;
use Floky\Http\Requests\Request;

class WelcomeController extends Controller
{


    public function index(TestCustomRequest $request, $id) {

        echo "Welcome to floky ";
    }
    
    public function validate(Request $request) {

        $rules = [
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required'
        ];

        $validation = validate(['email' => 'test'], $rules); // with helper

        if (!$validation->isValid()) {

            return dump($validation->getErrors());
        }

        return dump('Validated');
    }

    public function test(Request $request)
    {

        $resource = new TestResource(['attr' => 'Value']);
        
        $collection = collect([3, 6, 7, 8]);

        // $collection->has(56))

        return $resource->toJSON();
    }

}