<?php

declare(strict_types = 1);

namespace Trefle\Response\Model\SubModel;

use Trefle\Response\Enumeration\LigneousTypeEnumeration;
use Trefle\Response\Enumeration\ToxicityEnumeration;

class Specifications
{
    public function __construct(
        private readonly LigneousTypeEnumeration|null $ligneousType,
        private readonly string|null                  $growthForm,
        private readonly string|null                  $growthHabit,
        private readonly string|null                  $growthRate,
        private readonly int|null                     $averageHeight, // cm
        private readonly int|null                     $maximumHeight, // cm
        private readonly string|null                  $nitrogenFixation,
        private readonly string|null                  $shapeAndOrientation,
        private readonly ToxicityEnumeration|null     $toxicity,
    ) {
    }

    public function getLigneousType(): LigneousTypeEnumeration|null
    {
        return $this->ligneousType;
    }

    public function getGrowthForm(): string|null
    {
        return $this->growthForm;
    }

    public function getGrowthHabit(): string|null
    {
        return $this->growthHabit;
    }

    public function getGrowthRate(): string|null
    {
        return $this->growthRate;
    }

    public function getAverageHeight(): int|null
    {
        return $this->averageHeight;
    }

    public function getMaximumHeight(): int|null
    {
        return $this->maximumHeight;
    }

    public function getNitrogenFixation(): string|null
    {
        return $this->nitrogenFixation;
    }

    public function getShapeAndOrientation(): string|null
    {
        return $this->shapeAndOrientation;
    }

    public function getToxicity(): ToxicityEnumeration|null
    {
        return $this->toxicity;
    }
}
