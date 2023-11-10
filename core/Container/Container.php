<?php

namespace Floky\Container;

use Closure;

class Container
{
    public array $services = [];

    public function get($id)
    {
        if (!isset($this->services[$id])) {

            return $this->resolveDependencies($id);
        }

        return $this->services[$id];
    }

    public function resolveDependencies($id)
    {

        $reflection = new \ReflectionClass($id);

        $constructor = $reflection->getConstructor();


        $dependencies =  [];

        if ($constructor) {

            $parameters = $constructor->getParameters();

            foreach($parameters as $parameter) {

                $type = $parameter->getType();

                if (!$type->isBuiltin()) {

                    $resolve_dependencies = $this->get($type->getName());

                    $dependencies[] = $resolve_dependencies;
                    // $this->services[] = $resolve_dependencies;

                } else $dependencies[] = NULL;
            }
        }

        $new_instance = $reflection->newInstanceArgs($dependencies);

    }

    public function set($id, $definition) {

        if (isset($this->services[$id])) {

            /**
             *TODO: return service is present 
             * */
            return false;
        }

        return $this->services[$id] = $definition;
    }
}