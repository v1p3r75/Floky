<?php

namespace App\Http\Controllers;

use Floky\Application;
use Floky\Facades\Email;
use Floky\Http\Controllers\Controller;
use Floky\Http\Requests\Request;
use Floky\Http\Responses\Response;

class WelcomeController extends Controller
{

    public function index(Request $request, Email $mail, $id) {

        $recipients = ['elfriedv16@gmail.com', 'kabirou2001@gmail.com'];

        $html = "<h1>Tu n'as encore rien vu.</h1>";
        $mail->isHtml(true)->sendMail($recipients, 'Welcome To Floky', $html . $request->attr);

        echo "Welcome to floky " . $id;
    }
}