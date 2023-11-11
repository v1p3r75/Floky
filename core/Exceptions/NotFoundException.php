<?php

namespace Floky\Exceptions;

class NotFoundException extends \Exception
{

    public function __construct($for = "", $code = 404) {

        if ($for == 'forPage') {

            view('404');
            exit();
        }
        parent::__construct("Not Found Exception", $code);
    }
}