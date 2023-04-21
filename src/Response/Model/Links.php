<?php

declare(strict_types = 1);

namespace Trefle\Response\Model;

class Links
{
    public function __construct(
        private readonly string      $self,
        private readonly string      $first,
        private readonly string      $last,
        private readonly string|null $next,
        private readonly string|null $prev,
    ) {
    }

    public function getSelf(): string
    {
        return $this->self;
    }

    public function getFirst(): string
    {
        return $this->first;
    }

    public function getLast(): string
    {
        return $this->last;
    }

    public function getNext(): string|null
    {
        return $this->next;
    }

    public function getPrev(): string|null
    {
        return $this->prev;
    }
}
