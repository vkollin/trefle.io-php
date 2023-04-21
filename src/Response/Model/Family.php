<?php

declare(strict_types = 1);

namespace Trefle\Response\Model;

class Family
{
    /**
     * @param int $id
     * @param string $name
     * @param string|null $commonName
     * @param string $slug
     * @param array|null $divisionOrder
     * @param array{ "self"?: string, division_order?: string } $links
     */
    public function __construct(
        private readonly int         $id,
        private readonly string      $name,
        private readonly string|null $commonName,
        private readonly string      $slug,
        private readonly array|null  $divisionOrder,#TODO: create a class for this
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

    public function getCommonName(): ?string
    {
        return $this->commonName;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getDivisionOrder(): ?array
    {
        return $this->divisionOrder;
    }

    /**
     * @return array{
     *     "self"?: string,
     *     division_order?: string
     * }
     */
    public function getLinks(): array
    {
        return $this->links;
    }
}
