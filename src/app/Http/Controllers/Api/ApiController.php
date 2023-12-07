<?php

namespace App\Http\Controllers\Api;

use Floky\Http\Controllers\Controller;
use Floky\Http\Requests\Request;
use Floky\Routing\Attributes\Get;
use Floky\Routing\Attributes\MatchWith;
use Floky\Routing\Attributes\Post;

class ApiController extends Controller
{

    #[MatchWith(['GET', 'POST'], 'users', middlewares: ['second'])]
    public function index(Request $request) {

        echo "Welcome to floky " . $request->attr;
    }

}