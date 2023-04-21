<?php

declare(strict_types = 1);

namespace Trefle\Response\Model\SubModel;

use Trefle\Response\Enumeration\ColorEnumeration;

class FruitOrSeed
{
    /**
     * @param list<ColorEnumeration>|null $color
     */
    public function __construct(
        private readonly bool|null   $conspicuous,
        private readonly array|null  $color,
        private readonly string|null $shape,
        private readonly bool|null   $seedPersistence,
    ) {
    }

    public function getConspicuous(): bool|null
    {
        return $this->conspicuous;
    }

    /**
     * @return ColorEnumeration[]|null
     */
    public function getColor(): array|null
    {
        return $this->color;
    }

    public function getShape(): string|null
    {
        return $this->shape;
    }

    public function getSeedPersistence(): bool|null
    {
        return $this->seedPersistence;
    }
}
