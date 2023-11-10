<?php

namespace Floky\Container;

class Container
 {
    public array $services = [];

    public function get($class)
    {
        if (! isset($this->services[$class])) {

            return $this->resolveDependencies($class);
        }

        return $this->services[$class];
    }

    public function resolveDependencies($class) {

        
    }
 }