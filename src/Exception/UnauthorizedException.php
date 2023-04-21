<?php

declare(strict_types = 1);

namespace Trefle\Exception;

use Throwable;

class UnauthorizedException extends TrefleRequestException
{
    public function __construct(string $message = 'The given token is invalid', int $code = 401, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
