<?php

declare(strict_types = 1);

namespace Trefle\Response;

use Trefle\Response\Model\Links;
use Trefle\Response\Model\Meta;
use Trefle\Response\Model\SpeciesCollection;

class SearchSpeciesResponse extends SearchResponse
{
    public function __construct(Meta $meta, Links $links, private readonly SpeciesCollection $species)
    {
        parent::__construct($meta, $links);
    }

    public function getSpecies(): SpeciesCollection
    {
        return $this->species;
    }
}
