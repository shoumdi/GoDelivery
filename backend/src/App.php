<?php

namespace App;

use APP\Di\AppModule;
use Route;

class App
{
    private $container = [];
    private ?Route $route;

    private function __construct(?Route $route) {
        $this->route = $route;
    }

    function setRouter(Route $route): self
    {
        $this->route = $route;
        return $this;
    }

    static function create(): self
    {
        return new self(null);
    }
    function build(): self
    {
        return new self($this->route);
    }

    function run()
    {
        $this->route->resolve(function (string $namespace) {
            $className = end(explode("\\", $namespace));
            $class = $this->container[$className];
            if (!!$class) {
                $class = call_user_func([AppModule::class , 'provide' . $className]);
                $this->container[$className];
            }
            return $class;
        });
    }
}
