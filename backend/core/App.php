<?php

namespace Core;

use Core\Container;
use Closure;
use Core\Request;
use Core\Route;
use ReflectionMethod;

class App
{

    private Request $req;
    private function __construct(
        private ?Route $route,
        private ?Container $container
    ) {
        $this->req = new Request();
        $this->route = $route;
        $this->container = $container;
    }

    function setRouter(Route $route): self
    {
        $this->route = $route;
        return $this;
    }

    function setContainer(Container $container): self
    {
        $this->container = $container;
        return $this;
    }

    static function create(): self
    {
        return new self(null, null);
    }
    function build(): self
    {
        return new self($this->route, $this->container);
    }

    function run()
    {
        $this->route->resolve($this->req->getMethod(), $this->req->getUri(), function (array $handler) {
            if ($handler instanceof Closure) return $this->container->call($handler);
            $this->callController($handler);
        });
    }


    private function callController(array $handler)
    {
        [$className, $methodName] = $handler;

        $controller = $this->container->make($className);
        return $this->callControllerMethod($controller,$methodName);
    }

    private function callControllerMethod(object $controller, string $method)
    {
        $refMethod = new ReflectionMethod($controller, $method);
        $dependencies = [];
        foreach ($refMethod->getParameters() as $param) {
            $dependencies[] = $this->container->make(
                $param->getType()->getName()
            );
        }
        return $controller->$method(...$dependencies);
    }
}
