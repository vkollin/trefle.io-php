<?php

declare(strict_types = 1);

namespace Trefle\Exception;

use Throwable;

class NotFoundException extends TrefleRequestException
{
    /**
     * @param array{0: string, 1: string} $uri
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(array $uri, int $code = 404, Throwable $previous = null)
    {
        parent::__construct(sprintf('Route \'%s\' with method \'%s\' was not found', $uri[0], $uri[1]), $code, $previous);
    }
}
