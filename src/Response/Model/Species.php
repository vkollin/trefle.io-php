<?php

declare(strict_types = 1);

namespace Trefle\Response\Model;

use Trefle\Response\Enumeration\DurationEnumeration;
use Trefle\Response\Enumeration\EdiblePartEnumeration;
use Trefle\Response\Enumeration\RankEnumeration;
use Trefle\Response\Enumeration\StatusEnumeration;
use Trefle\Response\Model\SubModel\Distributions;
use Trefle\Response\Model\SubModel\Flower;
use Trefle\Response\Model\SubModel\Foliage;
use Trefle\Response\Model\SubModel\FruitOrSeed;
use Trefle\Response\Model\SubModel\Growth;
use Trefle\Response\Model\SubModel\Images;
use Trefle\Response\Model\SubModel\Specifications;

class Species extends SpeciesBase
{
    /**
     * @param list<DurationEnumeration>|null $duration
     * @param list<EdiblePartEnumeration>|null $ediblePart
     * @param list<string>|null $commonNames
     */
    public function __construct(
        int                                  $id,
        string                               $slug,
        string                               $scientificName,
        int|null                             $genusId,
        string|null                          $genus,
        string|null                          $family,
        array|null                           $links,
        string|null                          $commonName,
        int|null                             $year,
        string|null                          $bibliography,
        string|null                          $author,
        string|null                          $familyCommonName,
        string|null                          $imageUrl,
        StatusEnumeration|null               $status,
        RankEnumeration|null                 $rank,
        array|null                           $synonyms,
        private readonly string|null         $observations,
        private readonly bool|null           $vegetable,
        private readonly array|null          $duration,
        private readonly array|null          $ediblePart,
        private readonly bool|null           $edible,
        private readonly Images|null         $images,
        private readonly array|null          $commonNames,
        private readonly Distributions|null  $distributions,
        private readonly Flower|null         $flower,
        private readonly Foliage|null        $foliage,
        private readonly FruitOrSeed|null    $fruitOrSeed,
        private readonly array|null          $sources,
        private readonly Specifications|null $specifications,
        private readonly Growth|null         $growth,
    ) {
        parent::__construct(
            $id,
            $slug,
            $scientificName,
            $genusId,
            $genus,
            $family,
            $links,
            $commonName,
            $year,
            $bibliography,
            $author,
            $familyCommonName,
            $imageUrl,
            $status,
            $rank,
            $synonyms,
        );
    }

    public function getObservations(): string|null
    {
        return $this->observations;
    }

    public function isVegetable(): bool|null
    {
        return $this->vegetable;
    }

    /**
     * @return DurationEnumeration[]|null
     */
    public function getDuration(): array|null
    {
        return $this->duration;
    }

    /**
     * @return EdiblePartEnumeration[]|null
     */
    public function getEdiblePart(): array|null
    {
        return $this->ediblePart;
    }

    public function isEdible(): bool|null
    {
        return $this->edible;
    }

    public function getImages(): Images|null
    {
        return $this->images;
    }

    public function getCommonNames(): array|null
    {
        return $this->commonNames;
    }

    public function getDistributions(): Distributions|null
    {
        return $this->distributions;
    }

    public function getFlower(): Flower|null
    {
        return $this->flower;
    }

    public function getFoliage(): Foliage|null
    {
        return $this->foliage;
    }

    public function getFruitOrSeed(): FruitOrSeed|null
    {
        return $this->fruitOrSeed;
    }

    public function getSources(): array|null
    {
        return $this->sources;
    }

    public function getSpecifications(): Specifications|null
    {
        return $this->specifications;
    }

    public function getGrowth(): Growth|null
    {
        return $this->growth;
    }
}
