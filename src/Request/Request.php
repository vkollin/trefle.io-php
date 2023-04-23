<?php

declare(strict_types = 1);

namespace Trefle\Request;

use Exception;
use Trefle\Enumeration\Method;

/**
 * @psalm-consistent-constructor
 */
abstract class Request
{
    private Method $method = Method::GET;

    private ?string $path = null;

    private array $parameters = [];

    public function __construct()
    {
    }

    public static function create(): static
    {
        return new static();
    }

    public function getMethod(): Method
    {
        return $this->method;
    }

    public function getUrl(): string
    {
        return sprintf('https://trefle.io/api/v1%s', $this->getPath());
    }

    public function getPath(): string
    {
        return $this->path ?? throw new Exception('Path is not set');
    }

    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function addParameter(string $string, ?string $token): void
    {
        $this->parameters[$string] = $token;
    }
}
