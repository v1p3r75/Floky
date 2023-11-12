<?php

namespace Floky\Exceptions;

class ParseErrorException extends \Exception
{

    public function __construct($msg = "", $code = 4000) {

        
        parent::__construct($msg, $code);
    }
}