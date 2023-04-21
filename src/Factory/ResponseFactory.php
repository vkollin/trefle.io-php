<?php

declare(strict_types = 1);

namespace Trefle\Factory;

use Trefle\Response\PlantResponse;
use Trefle\Response\SearchSpeciesResponse;
use Trefle\Response\SpeciesResponse;

class ResponseFactory
{
    final public function __construct(
        private readonly ModelFactory $modelFactory,
    ) {
    }

    public static function create(): static
    {
        return new static(new ModelFactory());
    }

    public function createSearchSpeciesResponse(array $response): SearchSpeciesResponse
    {
        return new SearchSpeciesResponse(
            $this->modelFactory->createMeta($response['meta']),
            $this->modelFactory->createLinks($response['links']),
            $this->modelFactory->createSpeciesCollection($response['data']),
        );
    }

    public function createSpeciesResponse(array $response): SpeciesResponse
    {
        return new SpeciesResponse(
            $this->modelFactory->createMeta($response['meta']),
            $this->modelFactory->createSpecies($response['data']),
        );
    }

    public function createPlantResponse(array $response): PlantResponse
    {
        return new PlantResponse(
            $this->modelFactory->createMeta($response['meta']),
            $this->modelFactory->createPlant($response['data']),
        );
    }
}
