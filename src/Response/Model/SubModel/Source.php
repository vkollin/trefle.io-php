<?php

declare(strict_types = 1);

namespace Trefle\Response\Model\SubModel;

use DateTimeImmutable;

class Source
{
    public function __construct(
        private readonly string|null       $id,
        private readonly string            $name,
        private readonly string|null       $url,
        private readonly string|null       $citation,
        private readonly DateTimeImmutable $lastUpdate,
    ) {
    }

    public function getId(): string|null
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrl(): string|null
    {
        return $this->url;
    }

    public function getCitation(): string|null
    {
        return $this->citation;
    }

    public function getLastUpdate(): DateTimeImmutable
    {
        return $this->lastUpdate;
    }
}
