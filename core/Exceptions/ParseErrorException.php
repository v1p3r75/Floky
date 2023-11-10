<?php

namespace Floky\Exceptions;

class ParseErrorException extends \Exception
{

    public function __construct($for = "", $code = 400) {

        
        parent::__construct("Parse Error Exception", $code);
    }
}