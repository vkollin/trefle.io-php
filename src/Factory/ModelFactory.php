<?php

declare(strict_types = 1);

namespace Trefle\Factory;

use BackedEnum;
use DateTimeImmutable;
use Trefle\Response\Enumeration\ColorEnumeration;
use Trefle\Response\Enumeration\DurationEnumeration;
use Trefle\Response\Enumeration\EdiblePartEnumeration;
use Trefle\Response\Enumeration\LigneousTypeEnumeration;
use Trefle\Response\Enumeration\MonthEnumeration;
use Trefle\Response\Enumeration\RankEnumeration;
use Trefle\Response\Enumeration\StatusEnumeration;
use Trefle\Response\Enumeration\TextureEnumeration;
use Trefle\Response\Enumeration\ToxicityEnumeration;
use Trefle\Response\Model\Family;
use Trefle\Response\Model\Genus;
use Trefle\Response\Model\Links;
use Trefle\Response\Model\Meta;
use Trefle\Response\Model\Plant;
use Trefle\Response\Model\Species;
use Trefle\Response\Model\SpeciesCollection;
use Trefle\Response\Model\SpeciesLight;
use Trefle\Response\Model\SubModel\Distribution;
use Trefle\Response\Model\SubModel\Distributions;
use Trefle\Response\Model\SubModel\Flower;
use Trefle\Response\Model\SubModel\Foliage;
use Trefle\Response\Model\SubModel\FruitOrSeed;
use Trefle\Response\Model\SubModel\Growth;
use Trefle\Response\Model\SubModel\Image;
use Trefle\Response\Model\SubModel\Images;
use Trefle\Response\Model\SubModel\Source;
use Trefle\Response\Model\SubModel\Specifications;

class ModelFactory
{
    public function createLinks(array $data): Links
    {
        return new Links(
            $data['self'],
            $data['first'],
            $data['last'],
            $data['prev'] ?? null,
            $data['next'] ?? null,
        );
    }

    public function createMeta(array $data): Meta
    {
        return new Meta(
            $data['total'] ?? 1,
        );
    }

    public function createSpeciesCollection(array $data): SpeciesCollection
    {
        $speciesLights = array_map(
            fn(array $item) => $this->createSpeciesLight($item),
            $data
        );

        return new SpeciesCollection(...$speciesLights);
    }

    public function createSpeciesLight(array $data): SpeciesLight
    {
        return new SpeciesLight(
            $data['id'],
            $data['slug'],
            $data['scientific_name'],
            $data['genus_id'],
            $data['genus'],
            $data['family'],
            $data['links'],
            $data['common_name'] ?? null,
            $data['year'] ?? null,
            $data['bibliography'] ?? null,
            $data['author'] ?? null,
            $data['family_common_name'] ?? null,
            $data['image_url'] ?? null,
            StatusEnumeration::from($data['status']),
            RankEnumeration::from($data['rank']),
            $data['synonyms'] ?? null,
        );
    }

    public function createPlant(array $data): Plant
    {
        return new Plant(
            $data['id'],
            $data['slug'],
            $data['scientific_name'],
            $data['genus_id'] ?? null,
            $data['genus'],
            $data['family'],
            $data['links'] ?? null,
            $data['common_name'] ?? null,
            $data['year'] ?? null,
            $data['bibliography'] ?? null,
            $data['author'] ?? null,
            $data['family_common_name'] ?? null,
            $data['image_url'] ?? null,
            $data['vegetable'] ?? null,
            $data['observations'] ?? null,
            $data['main_species_id'] ?? null,
            isset($data['main_species']) ? $this->createSpecies($data['main_species']) : null,
            isset($data['species']) ? array_map(fn(array $d) => $this->createSpeciesLight($d), $data['species']) : null,
            isset($data['subSpecies']) ? array_map(fn(array $d) => $this->createSpeciesLight($d), $data['subSpecies']) : null,
            isset($data['varieties']) ? array_map(fn(array $d) => $this->createSpeciesLight($d), $data['varieties']) : null,
            isset($data['hybrid']) ? array_map(fn(array $d) => $this->createSpeciesLight($d), $data['hybrid']) : null,
            isset($data['forms']) ? array_map(fn(array $d) => $this->createSpeciesLight($d), $data['forms']) : null,
            isset($data['subVarieties']) ? array_map(fn(array $d) => $this->createSpeciesLight($d), $data['subVarieties']) : null,
            isset($data['sources']) ? array_map(fn(array $d) => $this->createSource($d), $data['sources']) : null,

        );
    }

    /**
     * @param array{
     *    id: int,
     *    name: string,
     *    slug: string,
     *    family?: array{ id: int, name: string, common_name: string|null, slug: string, division_order?: array, links: array{ "self"?: string, division_order?: string } },
     *    links: array{
     *        "self"?: string,
     *        family?: string
     *    }
     * } $data
     * @return Genus
     */
    public function createGenus(array $data): Genus
    {
        return new Genus(
            $data['id'],
            $data['name'],
            $data['slug'],
            isset($data['family']) ? $this->createFamily($data['family']) : null,
            $data['links'],
        );
    }

    /**
     * @param array{
     *  id: int,
     *  name: string,
     *  common_name: string|null,
     *  slug: string,
     *  division_order?: array,
     *  links: array{ "self"?: string, division_order?: string }
     * } $data
     * @return Family
     */
    public function createFamily(array $data): Family
    {
        return new Family(
            $data['id'],
            $data['name'],
            $data['common_name'],
            $data['slug'],
            $data['division_order'] ?? null,
            $data['links'],
        );
    }

    public function createSpecies(array $data): Species
    {
        return new Species(
            $data['id'],
            $data['slug'],
            $data['scientific_name'],
            $data['genus_id'] ?? null,
            $data['genus'] ?? null,
            $data['family'] ?? null,
            $data['links'] ?? null,
            $data['common_name'] ?? null,
            $data['year'] ?? null,
            $data['bibliography'] ?? null,
            $data['author'] ?? null,
            $data['family_common_name'] ?? null,
            $data['image_url'] ?? null,
            isset($data['status']) ? StatusEnumeration::from($data['status']) : null,
            isset($data['rank']) ? RankEnumeration::from($data['rank']) : null,
            $data['synonyms'] ?? null,
            $data['observations'] ?? null,
            $data['vegetable'] ?? null,
            isset($data['duration']) ? $this->mapEnumList($data['duration'], DurationEnumeration::class) : null,
            isset($data['edible_part']) ? $this->mapEnumList($data['edible_part'], EdiblePartEnumeration::class) : null,
            $data['edible'] ?? null,
            isset($data['images']) ? $this->createImages($data['images']) : null,
            $data['common_names'] ?? null,
            isset($data['distributions']) ? $this->createDistributions($data['distributions']) : null,
            isset($data['flower']) ? $this->createFlower($data['flower']) : null,
            isset($data['foliage']) ? $this->createFoliage($data['foliage']) : null,
            isset($data['fruit_or_seed']) ? $this->createFruitOrSeed($data['fruit_or_seed']) : null,
            $data['sources'] ?? null,
            isset($data['specifications']) ? $this->createSpecifications($data['specifications']) : null,
            isset($data['growth']) ? $this->createGrowth($data['growth']) : null,
        );
    }

    private function createImages(array $data): Images
    {
        return new Images(
            isset($data['flower']) ? array_map(fn(array $d) => $this->createImage($d), $data['flower']) : [],
            isset($data['leaf']) ? array_map(fn(array $d) => $this->createImage($d), $data['leaf']) : [],
            isset($data['habit']) ? array_map(fn(array $d) => $this->createImage($d), $data['habit']) : [],
            isset($data['fruit']) ? array_map(fn(array $d) => $this->createImage($d), $data['fruit']) : [],
            isset($data['bark']) ? array_map(fn(array $d) => $this->createImage($d), $data['bark']) : [],
            isset($data['other']) ? array_map(fn(array $d) => $this->createImage($d), $data['other']) : [],
        );
    }

    private function createImage(array $data): Image
    {
        return new Image(
            $data['id'],
            $data['image_url'],
            $data['copyright'],
        );
    }


    private function createDistributions(array $data): Distributions
    {
        return new Distributions(
            isset($data['native']) ? array_filter(array_map(fn(array $d) => $this->createDistribution($d), $data['native'])) : [],
            isset($data['introduced']) ? array_filter(array_map(fn(array $d) => $this->createDistribution($d), $data['introduced'])) : [],
            isset($data['doubtful']) ? array_filter(array_map(fn(array $d) => $this->createDistribution($d), $data['doubtful'])) : [],
            isset($data['absent']) ? array_filter(array_map(fn(array $d) => $this->createDistribution($d), $data['absent'])) : [],
            isset($data['extinct']) ? array_filter(array_map(fn(array $d) => $this->createDistribution($d), $data['extinct'])) : [],
        );
    }

    private function createDistribution(array $data): Distribution
    {
        return new Distribution(
            $data['id'],
            $data['name'],
            $data['slug'],
            $data['tdwg_code'],
            $data['tdwg_level'],
            $data['species_count'],
            $data['links']['self'],
            $data['links']['plants'],
            $data['links']['species'],
        );
    }

    private function createFlower(array $data): Flower
    {
        return new Flower(
            isset($data['color']) ? $this->mapEnumList($data['color'], ColorEnumeration::class) : null,
            $data['conspicuous'],
        );
    }

    private function createFoliage(array $data): Foliage
    {
        return new Foliage(
            isset($data['texture']) ? TextureEnumeration::tryFrom($data['texture']) : null,
            isset($data['color']) ? $this->mapEnumList($data['color'], ColorEnumeration::class) : null,
            $data['leaf_retention'],
        );
    }

    private function createFruitOrSeed(array $data): FruitOrSeed
    {
        return new FruitOrSeed(
            $data['conspicuous'],
            isset($data['color']) ? $this->mapEnumList($data['color'], ColorEnumeration::class) : null,
            $data['shape'],
            $data['seed_persistence'],
        );
    }

    private function createSpecifications(array $data): Specifications
    {
        return new Specifications(
            isset($data['ligneous_type']) ? LigneousTypeEnumeration::tryFrom($data['ligneous_type']) : null,
            $data['growth_form'],
            $data['growth_habit'],
            $data['growth_rate'],
            isset($data['average_height']) ? $data['average_height']['cm'] : null,
            isset($data['maximum_height']) ? $data['maximum_height']['cm'] : null,
            $data['nitrogen_fixation'],
            $data['shape_and_orientation'],
            isset($data['toxicity']) ? ToxicityEnumeration::tryFrom($data['toxicity']) : null,
        );
    }

    private function createGrowth(array $data): Growth
    {
        return new Growth(
            $data['days_to_harvest'],
            $data['description'],
            $data['sowing'],
            $data['ph_minimum'],
            $data['ph_maximum'],
            $data['light'],
            $data['atmospheric_humidity'],
            isset($data['growth_months']) ? $this->mapEnumList($data['growth_months'], MonthEnumeration::class) : null,
            isset($data['bloom_months']) ? $this->mapEnumList($data['bloom_months'], MonthEnumeration::class) : null,
            isset($data['fruit_months']) ? $this->mapEnumList($data['fruit_months'], MonthEnumeration::class) : null,
            isset($data['row_spacing']) ? $data['row_spacing']['cm'] : null,
            isset($data['spread']) ? $data['spread']['cm'] : null,
            isset($data['minimum_precipitation']) ? $data['minimum_precipitation']['mm'] : null,
            isset($data['maximum_precipitation']) ? $data['maximum_precipitation']['mm'] : null,
            isset($data['minimum_root_depth']) ? $data['minimum_root_depth']['cm'] : null,
            isset($data['minimum_temperature']) ? $data['minimum_temperature']['deg_c'] : null,
            isset($data['maximum_temperature']) ? $data['maximum_temperature']['deg_c'] : null,
            $data['soil_nutriments'],
            $data['soil_salinity'],
            $data['soil_texture'],
            $data['soil_humidity'],
        );
    }

    private function createSource(array $data): Source
    {
        return new Source(
            $data['id'] ?? null,
            $data['name'],
            $data['url'] ?? null,
            $data['citation'] ?? null,
            new DateTimeImmutable($data['last_update']),
        );
    }

    /**
     * @template T of BackedEnum
     * @param array<string|null> $data
     * @param class-string<T> $enumClass
     * @return list<T>
     */
    private function mapEnumList(array $data, string $enumClass): array
    {
        /** @var BackedEnum $enumClass */
        $enums = [];

        foreach ($data as $d) {
            if ($d === null) {
                continue;
            }

            /** @var T $enum */
            $enum = $enumClass::from($d);

            $enums[] = $enum;
        }

        return $enums;
    }
}
