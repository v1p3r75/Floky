<?php

namespace Floky\Container;

use Closure;
use ReflectionClass;

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

    public function set($id, $definition)
    {
        if (isset($this->services[$id])) {
            return false;
        }
        $this->services[$id] = $definition;
        return true;
    }

    public function resolveDependencies($id)
    {
        $reflection = new ReflectionClass($id);
        $constructor = $reflection->getConstructor();

        if (!$constructor) {
            return $reflection->newInstance();
        }

        $parameters = $constructor->getParameters();
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

        return $reflection->newInstanceArgs($dependencies);
    }
}
