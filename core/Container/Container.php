<?php

namespace Floky\Container;

class Container
 {
    public array $services = [];

    public function get($id)
    {
        if (! isset($this->services[$id])) {

            return $this->resolveDependencies($id);
        }

        return $this->services[$id];
    }

    public function resolveDependencies($id) {

        $reflection = new \ReflectionClass($id);

        $constructor = $reflection->getConstructor();

        if (! $constructor) {

            
        }
    }


 }