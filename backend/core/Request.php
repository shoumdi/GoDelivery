<?php

namespace Core;

use ReflectionClass;

class Request
{

    private array $headers;
    private ?array $body;
    private ?object $parsedBody;
    private ?string $uri;
    private ?string $method;

    function __construct()
    {
        $this->uri = $this->relativeUri();
        $this->method = $_SERVER['REQUEST_METHOD'];
    }
    static function create(): self
    {
        return new self();
    }
    public function getHeaders(): array
    {
        return [];
    }
    public function hasHeader($name): bool
    {
        return true;
    }
    public function getHeader($name): array
    {
        return [];
    }
    public function withHeader($name, $value): self
    {
        return $this;
    }
    public function withAddedHeader($name, $value): self
    {
        return $this;
    }
    public function withoutHeader($name): self
    {
        return $this;
    }

    public function getBody(string $className): array
    {
        return $this->body;
    }
    public function withBody(array $body): self
    {
        return $this;
    }



    public function getMethod(): string
    {
        return $this->method;
    }
    public function withMethod($method): self
    {
        $this->method = $method;
        return $this;
    }

    public function getUri(): string
    {
        return $this->uri;
    }
    public function withUri(string $uri): self
    {
        $this->uri = $uri;
        return $this;
    }


    public function getCookieParams(): array
    {
        return [];
    }
    public function withCookieParams(array $cookies): self
    {
        return $this;
    }

    public function getQueryParams(): array
    {
        return [];
    }
    public function withQueryParams(array $query): self
    {
        return $this;
    }

    public function getUploadedFiles(): array
    {
        return [];
    }
    public function withUploadedFiles(array $uploadedFiles): self
    {
        return $this;
    }

    public function getParsedBody(string $className): null|object
    {
        $ref = new ReflectionClass($className);
        $attrs = $ref->getConstructor()->getAttributes();
        $data = [];
        foreach ($attrs as $attr) {
            $data[$attr->getName()] = $this->body[$attr->getName()] ?? null;
        }
        $this->parsedBody = call_user_func([$className, 'fromArray'], $data);
        return $this->parsedBody;
    }
    public function withParsedBody(string $className): self
    {
        return $this;
    }

    public function getAttributes(): array
    {
        return [];
    }
    public function getAttribute($name, $default = null)
    {
        return [];
    }
    public function withAttribute($name, $value): self
    {
        return $this;
    }
    public function withoutAttribute($name): self
    {
        return $this;
    }

    private function relativeUri()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $base = "/GoDelivery";
        if(str_starts_with($path,$base)) $path = substr($path,strlen($base));
        
        return $path;
    }
}
