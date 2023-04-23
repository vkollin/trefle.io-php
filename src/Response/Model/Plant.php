<?php

declare(strict_types = 1);

namespace Trefle\Response\Model;

use Trefle\Response\Model\SubModel\Source;

class Plant
{
    /**
     * @param int $id
     * @param string $slug
     * @param string $scientificName
     * @param int|null $genusId
     * @param string|null $genus
     * @param string|null $family
     * @param array{ self?: string, genus?: string, species?: string }|null $links
     * @param string|null $commonName
     * @param int|null $year
     * @param string|null $bibliography
     * @param string|null $author
     * @param string|null $familyCommonName
     * @param string|null $imageUrl
     * @param bool|null $vegetable
     * @param string|null $observations
     * @param int|null $mainSpeciesId
     * @param Species|null $mainSpecies
     * @param array<SpeciesLight>|null $species
     * @param array<SpeciesLight>|null $subSpecies
     * @param array<SpeciesLight>|null $varieties
     * @param array<SpeciesLight>|null $hybrids
     * @param array<SpeciesLight>|null $forms
     * @param array<SpeciesLight>|null $subVarieties
     * @param array<Source>|null $sources
     */
    public function __construct(
        private readonly int          $id,
        private readonly string       $slug,
        private readonly string       $scientificName,
        private readonly int|null     $genusId,
        private readonly string|null  $genus,
        private readonly string|null  $family,
        private readonly array|null   $links,
        private readonly string|null  $commonName,
        private readonly int|null     $year,
        private readonly string|null  $bibliography,
        private readonly string|null  $author,
        private readonly string|null  $familyCommonName,
        private readonly string|null  $imageUrl,
        private readonly bool|null    $vegetable,
        private readonly string|null  $observations,
        private readonly int|null     $mainSpeciesId,
        private readonly Species|null $mainSpecies,
        private readonly array|null   $species,
        private readonly array|null   $subSpecies,
        private readonly array|null   $varieties,
        private readonly array|null   $hybrids,
        private readonly array|null   $forms,
        private readonly array|null   $subVarieties,
        private readonly array|null   $sources,
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

    public function getGenusId(): ?int
    {
        return $this->genusId;
    }

    public function getGenus(): ?string
    {
        return $this->genus;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }

    /**
     * @return array{ self?: string, genus?: string, species?: string }|null
     */
    public function getLinks(): ?array
    {
        return $this->links;
    }

    public function getCommonName(): ?string
    {
        return $this->commonName;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function getBibliography(): ?string
    {
        return $this->bibliography;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function getFamilyCommonName(): ?string
    {
        return $this->familyCommonName;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function getVegetable(): ?bool
    {
        return $this->vegetable;
    }

    public function getObservations(): ?string
    {
        return $this->observations;
    }

    public function getMainSpeciesId(): ?int
    {
        return $this->mainSpeciesId;
    }

    public function getMainSpecies(): ?Species
    {
        return $this->mainSpecies;
    }

    /**
     * @return array<SpeciesLight>|null
     */
    public function getSpecies(): ?array
    {
        return $this->species;
    }

    /**
     * @return array<SpeciesLight>|null
     */
    public function getSubSpecies(): ?array
    {
        return $this->subSpecies;
    }

    /**
     * @return array<SpeciesLight>|null
     */
    public function getVarieties(): ?array
    {
        return $this->varieties;
    }

    /**
     * @return array<SpeciesLight>|null
     */
    public function getHybrids(): ?array
    {
        return $this->hybrids;
    }

    /**
     * @return array<SpeciesLight>|null
     */
    public function getForms(): ?array
    {
        return $this->forms;
    }

    /**
     * @return array<SpeciesLight>|null
     */
    public function getSubVarieties(): ?array
    {
        return $this->subVarieties;
    }

    /**
     * @return array<Source>|null
     */
    public function getSources(): ?array
    {
        return $this->sources;
    }
}
