<?php

declare(strict_types = 1);

namespace Trefle\Response\Model;

use Trefle\Response\Enumeration\RankEnumeration;
use Trefle\Response\Enumeration\StatusEnumeration;

abstract class SpeciesBase
{
    public function __construct(
        private readonly int                    $id,
        private readonly string                 $slug,
        private readonly string                 $scientificName,
        private readonly int|null               $genusId,
        private readonly string|null            $genus,
        private readonly string|null            $family,
        private readonly array|null             $links,
        private readonly string|null            $commonName,
        private readonly int|null               $year,
        private readonly string|null            $bibliography,
        private readonly string|null            $author,
        private readonly string|null            $familyCommonName,
        private readonly string|null            $imageUrl,
        private readonly StatusEnumeration|null $status,
        private readonly RankEnumeration|null   $rank,
        private readonly array|null             $synonyms,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getScientificName(): string
    {
        return $this->scientificName;
    }

    public function getGenusId(): int|null
    {
        return $this->genusId;
    }

    public function getGenus(): string|null
    {
        return $this->genus;
    }

    public function getFamily(): string|null
    {
        return $this->family;
    }

    public function getLinks(): array|null
    {
        return $this->links;
    }

    public function getCommonName(): string|null
    {
        return $this->commonName;
    }

    public function getYear(): int|null
    {
        return $this->year;
    }

    public function getBibliography(): string|null
    {
        return $this->bibliography;
    }

    public function getAuthor(): string|null
    {
        return $this->author;
    }

    public function getFamilyCommonName(): string|null
    {
        return $this->familyCommonName;
    }

    public function getImageUrl(): string|null
    {
        return $this->imageUrl;
    }

    public function getStatus(): StatusEnumeration|null
    {
        return $this->status;
    }

    public function getRank(): RankEnumeration|null
    {
        return $this->rank;
    }

    public function getSynonyms(): array|null
    {
        return $this->synonyms;
    }
}
