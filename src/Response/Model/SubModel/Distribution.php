<?php

declare(strict_types = 1);

namespace Trefle\Response\Model\SubModel;

class Distribution
{
    public function __construct(
        private readonly int    $id,
        private readonly string $name,
        private readonly string $slug,
        private readonly string $tdwgCode,
        private readonly int    $tdwgLevel,
        private readonly int    $speciesCount,
        private readonly string $linkSelf,
        private readonly string $linkPlants,
        private readonly string $linkSpecies,
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

    public function getTdwgCode(): string
    {
        return $this->tdwgCode;
    }

    public function getTdwgLevel(): int
    {
        return $this->tdwgLevel;
    }

    public function getSpeciesCount(): int
    {
        return $this->speciesCount;
    }

    public function getLinkSelf(): string
    {
        return $this->linkSelf;
    }

    public function getLinkPlants(): string
    {
        return $this->linkPlants;
    }

    public function getLinkSpecies(): string
    {
        return $this->linkSpecies;
    }
}
