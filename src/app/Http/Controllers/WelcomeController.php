<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestCustomRequest;
use App\Http\Resources\TestResource;
use App\Models\User;
use Floky\Http\Controllers\Controller;
use Floky\Http\Requests\Request;
use Floky\Routing\Attributes\Get;

class WelcomeController extends Controller
{

    #[Get('welcome', 't', ['first'])]
    public function index(Request $request) {

        return response()->json(['user' => $request->header()->getBearer()]);
    }


    // public function index(TestCustomRequest $request, $id) {

    //     echo "Validated !";
    // }
    
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

    public function resource(Request $request)
    {

        $resource = new TestResource(['attr' => 'Value']);
        
        $collection = collect([3, 6, 7, 8]);

        // $collection->has(56))

        return $resource->toJSON();
    }


    #[Get(uri: 'test', middlewares: ['first'])]
    public function test(Request $request)
    {

        dd($request->attr);
    }

    #[Get('models')]
    public function models(Request $request, User $user) {

        // User::insert(['username' => 'Karl']);

        $result = User::findAll();

        return response()->json(['total' => $result->random()]);
    }

}