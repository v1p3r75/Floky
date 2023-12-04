<?php

namespace App\Http\Requests;

use Floky\Http\Requests\CustomRequest;
use Floky\Http\Requests\Request;

class TestCustomRequest extends CustomRequest
{

    protected function autorize(Request $request): bool
    {

        return true;
    }

    protected function rules(): array
    {
        return [
            'email' => 'required',
        ];
    }

    protected function messages(): array
    {
        return 
        [          
           // Validation messages 
        ];
    }
}
