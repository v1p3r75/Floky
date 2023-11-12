<?php

namespace Floky\Exceptions;

class NotFoundException extends \Exception
{

    public function __construct($msg = "", $code = 4004) {

        parent::__construct($msg, $code);
    }
}