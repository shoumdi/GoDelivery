<?php

namespace Core;

use Exception;
use ReflectionClass;
use ReflectionMethod;

class Container
{
    private array $bindings = [];
    private array $singelton = [];
    public function __construct() {}

    public function bind(string $root,callable $factory){
        $this->bindings[$root] = $factory;
    }

    public function resolve(string $root){
        if (!isset($this->bindings[$root]) || !isset($this->singelton[$root])) {
            throw new Exception("No binding for $root");
            exit;
        }
        if(isset($this->singelton[$root])) return $this->singelton[$root];
        return $this->bindings[$root]($this);
    }

    public function singleton(string $className,callable $factory){
        if(isset($this->singelton[$className])) return;
         $this->singelton[$className] = $factory($this);        
    }
    public function make(string $className){
        $ref = new ReflectionClass($className);
        $construct = $ref->getConstructor();
        if (!$construct) return new $className;
        
        $dependencies = [];

        foreach($construct->getParameters() as $params){
            $type = $params->getType();

            if(!$type) throw new Exception("Cannot resolve this dependency");

            $dependencies[] = $this->make(
                $type->getName()
            );
        }
        return $ref->newInstanceArgs($dependencies);
    }

    public function call(callable $callback){
        $ref = new ReflectionMethod($callback);

        $dependencies = [];

        foreach($ref->getParameters() as $param){
            $type = $param->getType();

            if(!$type) throw new Exception("Cannot resolve this dependency");

            $dependencies[] = $this->make(
                $type->getName()
            );
        }
        return $callback(...$dependencies);
    }
}