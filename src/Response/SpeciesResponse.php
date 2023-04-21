<?php

declare(strict_types = 1);

namespace Trefle\Response;

use Trefle\Response\Model\Meta;
use Trefle\Response\Model\Species;

class SpeciesResponse extends Response
{
    public function __construct(Meta $meta, private readonly Species $species)
    {
        parent::__construct($meta);
    }

    public function getSpecies(): Species
    {
        return $this->species;
    }
}
