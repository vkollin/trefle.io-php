<?php

declare(strict_types = 1);

namespace Trefle\Response\Model\SubModel;

use Trefle\Response\Enumeration\ColorEnumeration;

class Flower
{
    /**
     * @param list<ColorEnumeration>|null $color
     * @param bool|null $conspicuous
     */
    public function __construct(
        private readonly array|null $color,
        private readonly bool|null  $conspicuous,
    ) {
    }

    /**
     * @return ColorEnumeration[]|null
     */
    public function getColor(): array|null
    {
        return $this->color;
    }

    public function getConspicuous(): bool|null
    {
        return $this->conspicuous;
    }
}
