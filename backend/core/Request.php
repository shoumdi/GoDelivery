<?php

namespace Core;

class Request
{

    static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    static function getUri(): string
    {
        return $_SERVER['REQUEST_URI'];
    }
    static function getHeaders() {}
    static function getHeader(string $name) {}
    static function getQueryParams() {}
    static function getParsedBody(): ?array
    {
        return json_decode($_SERVER['body']) ?? null;
    }
    static function getCookieParams() {}
    static function getUploadedFiles() {}
    static function withHeader($name, $value) {}
    static function withBody($stream) {}
}
