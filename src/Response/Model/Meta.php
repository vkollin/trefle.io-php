<?php

declare(strict_types = 1);

namespace Trefle\Response\Model;

class Meta
{
    public function __construct(private readonly int $total)
    {
    }

    public function getTotal(): int
    {
        return $this->total;
    }
}
