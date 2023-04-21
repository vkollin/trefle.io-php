<?php

declare(strict_types = 1);

namespace Trefle\Response\Model;

use Trefle\Lib\Collection\AbstractList;

/** @extends AbstractList<SpeciesLight> */
class SpeciesCollection extends AbstractList
{
    public function __construct(SpeciesLight ...$species)
    {
        parent::__construct($species);
    }
}
