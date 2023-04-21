<?php

declare(strict_types = 1);

namespace Trefle\Response\Model;

class Genus
{
    public function __construct(
        private readonly int         $id,
        private readonly string      $name,
        private readonly string      $slug,
        private readonly Family|null $family,
        private readonly array       $links,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getFamily(): Family|null
    {
        return $this->family;
    }

    public function getLinks(): array
    {
        return $this->links;
    }
}
