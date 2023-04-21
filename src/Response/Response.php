<?php

declare(strict_types = 1);

namespace Trefle\Response;

use Trefle\Response\Model\Meta;

class Response
{
    public function __construct(
        private readonly Meta $meta,
    ) {
    }

    public function getMeta(): Meta
    {
        return $this->meta;
    }
}
