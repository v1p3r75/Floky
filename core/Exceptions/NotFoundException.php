<?php

namespace Floky\Exceptions;

class NotFoundException extends \Exception
{

    public function __construct($for = "", $code = 404) {

        parent::__construct("Not Found Exception", $code);
    }
}