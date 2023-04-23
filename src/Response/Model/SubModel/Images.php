<?php

declare(strict_types = 1);

namespace Trefle\Response\Model\SubModel;

class Images
{
    /**
     * @param array<Image> $flower
     * @param array<Image> $leaf
     * @param array<Image> $habit
     * @param array<Image> $fruit
     * @param array<Image> $bark
     * @param array<Image> $other
     */
    public function __construct(
        private readonly array $flower,
        private readonly array $leaf,
        private readonly array $habit,
        private readonly array $fruit,
        private readonly array $bark,
        private readonly array $other,
    ) {
    }

    public function getFlower(): array
    {
        return $this->flower;
    }

    public function getLeaf(): array
    {
        return $this->leaf;
    }

    public function getHabit(): array
    {
        return $this->habit;
    }

    public function getFruit(): array
    {
        return $this->fruit;
    }

    public function getBark(): array
    {
        return $this->bark;
    }

    public function getOther(): array
    {
        return $this->other;
    }
}
