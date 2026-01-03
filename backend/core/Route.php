<?php

use Core\Request;
use Core\Response;

class Route
{
    private $routes = [];

    function get(
        string $root,
        array $handler
    ) {
        $this->routes = ["GET" => [$root => $handler]];
    }

    function post(
        string $root,
        array $handler
    ) {
        $this->routes = ["Post" => [$root => $handler]];
    }

    function resolve(callable $resolveClass)
    {

        $method = Request::getMethod();
        $path = Request::getUri();
        $handler = $this->routes[$method][$path];

        if (!!$handler) Response::withStatus(404);

        $class = $resolveClass($handler[0]);
        $class->$handler[1]();
    }
}
