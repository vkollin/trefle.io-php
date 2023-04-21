<?php

declare(strict_types = 1);

namespace Trefle\Response;

use Trefle\Response\Model\Meta;
use Trefle\Response\Model\Plant;

class PlantResponse extends Response
{
    public function __construct(Meta $meta, private readonly Plant $plant)
    {
        parent::__construct($meta);
    }

    public function getPlant(): Plant
    {
        return $this->plant;
    }
}
