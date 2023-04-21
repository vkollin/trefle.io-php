<?php

declare(strict_types = 1);

namespace Trefle\Response\Model\SubModel;

use Trefle\Response\Enumeration\ColorEnumeration;
use Trefle\Response\Enumeration\TextureEnumeration;

class Foliage
{
    /**
     * @param list<ColorEnumeration>|null $color
     */
    public function __construct(
        private readonly TextureEnumeration|null $texture,
        private readonly array|null              $color,
        private readonly bool|null               $leafRetention,
    ) {
    }

    public function getTexture(): TextureEnumeration|null
    {
        return $this->texture;
    }

    /**
     * @return ColorEnumeration[]|null
     */
    public function getColor(): array|null
    {
        return $this->color;
    }

    public function getLeafRetention(): bool|null
    {
        return $this->leafRetention;
    }
}
