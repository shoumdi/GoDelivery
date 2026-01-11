<?php

namespace Core;


use Uri\UriException;

class Route
{
    public function __construct(
        ) {}
    private $routes = [];

    function get(
        string $root,
        array $handler
    ) {
        $this->routes['GET'][$root] =  $handler;
    }

    function post(
        string $root,
        array $handler
    ) {
        $this->routes["POST"][$root] = $handler;
    }

    function resolve(
        string $httpMethod,
        string $root,
        callable $callHandler)
    {
        $handler = $this->routes[$httpMethod][$root] ?? null;

        if ($handler === null) throw new UriException("page not found");
        
        return $callHandler($handler);
    }
}
