<?php

namespace Floky\Container;

use Closure;
use ReflectionClass;
use ReflectionMethod;

class Container
{
    private array $services = [];

    private static ?Container $instance = null;

    private function __construct() {}

    public static function getInstance(): self {

        if (!self::$instance) {

            self::$instance = new self();
        }

        return self::$instance;
    }

    public function get($id)
    {

        if (isset($this->services[$id])) {

            return $this->services[$id];
        }
        return $this->resolveDependencies($id);
    }

    public function set($id, callable $definition)
    {
        if (isset($this->services[$id])) {

            return false;
        }

        $this->services[$id] = $definition();

        return true;
    }

    private function resolveDependencies($id)
    {
        $reflection = new ReflectionClass($id);

        $constructor = $reflection->getConstructor();

        if (!$constructor) {

            return $reflection->newInstance();
        }

        $parameters = $constructor->getParameters();
       
        $dependencies =  $this->resolveParameters($reflection, $parameters);

        return $reflection->newInstanceArgs($dependencies);
    }

    private function resolveParameters(ReflectionClass | ReflectionMethod $reflection, array $parameters): array {

        $dependencies = [];

        foreach ($parameters as $parameter) {

            $type = $parameter->getType();

            if (!$type || $type->isBuiltin()) {

                $dependencies[] = null;

            } else {

                $resolve_dependencies = $this->get($type->getName());
                $dependencies[] = $resolve_dependencies;
            }
        }

        return $dependencies;
    }

    public function getMethod($class, $name, ...$args) {

        $reflection = new ReflectionMethod($class, $name);

        $parameters = $reflection->getParameters();

        $dependencies = $this->resolveParameters($reflection, $parameters);

        $params = $this->addParams($dependencies, $args);
        
       return $reflection->invokeArgs($class, $params);
    }

    private function addParams(array $dependencies, $args): array {

        $params = array_merge($dependencies, ...$args);

        $dependencies = [];

        foreach($params as $param) {

            if (is_null($param)) {
                continue;
            }
            $dependencies[] = $param;
        }

        return $dependencies;
    }

    private function getMethodWithDependencies(array $action) {

        $class = $action[0] -> getClosure($action[1]);


    }
}
