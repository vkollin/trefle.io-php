<?php

declare(strict_types = 1);

namespace Trefle\Response\Model\SubModel;

class Image
{
    public function __construct(
        private readonly int    $id,
        private readonly string $url,
        private readonly string $copyright,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getCopyright(): string
    {
        return $this->copyright;
    }
}
