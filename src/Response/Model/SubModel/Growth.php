<?php

declare(strict_types = 1);

namespace Trefle\Response\Model\SubModel;

class Growth
{
    public function __construct(
        private readonly float|null  $daysToHarvest,
        private readonly string|null $description,
        private readonly string|null $sowing,
        private readonly float|null  $phMinimum,
        private readonly float|null  $phMaximum,
        private readonly int|null    $light, # 0 - 10
        private readonly int|null    $atmosphericHumidity, # 0 - 10
        private readonly array|null  $growthMonths,
        private readonly array|null  $bloomMonths,
        private readonly array|null  $fruitMonths,
        private readonly int|null    $rowSpacing, #cm
        private readonly int|null    $spread,#cm
        private readonly int|null    $minimumPrecipitation, #mm
        private readonly int|null    $maximumPrecipitation, #mm
        private readonly int|null    $minimumRootDepth, #cm
        private readonly int|null    $minimumTemperature, #°C
        private readonly int|null    $maximumTemperature, #°C
        private readonly int|null    $soilNutriments, # 0 - 10
        private readonly int|null    $soilSalinity,# 0 - 10
        private readonly int|null    $soilTexture, # 0 - 10
        private readonly int|null    $soilHumidity, # 0 - 10
    ) {
    }

    public function getDaysToHarvest(): float|null
    {
        return $this->daysToHarvest;
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    public function getSowing(): string|null
    {
        return $this->sowing;
    }

    public function getPhMinimum(): float|null
    {
        return $this->phMinimum;
    }

    public function getPhMaximum(): float|null
    {
        return $this->phMaximum;
    }

    public function getLight(): int|null
    {
        return $this->light;
    }

    public function getAtmosphericHumidity(): int|null
    {
        return $this->atmosphericHumidity;
    }

    public function getGrowthMonths(): array|null
    {
        return $this->growthMonths;
    }

    public function getBloomMonths(): array|null
    {
        return $this->bloomMonths;
    }

    public function getFruitMonths(): array|null
    {
        return $this->fruitMonths;
    }

    public function getRowSpacing(): int|null
    {
        return $this->rowSpacing;
    }

    public function getSpread(): int|null
    {
        return $this->spread;
    }

    public function getMinimumPrecipitation(): int|null
    {
        return $this->minimumPrecipitation;
    }

    public function getMaximumPrecipitation(): int|null
    {
        return $this->maximumPrecipitation;
    }

    public function getMinimumRootDepth(): int|null
    {
        return $this->minimumRootDepth;
    }

    public function getMinimumTemperature(): int|null
    {
        return $this->minimumTemperature;
    }

    public function getMaximumTemperature(): int|null
    {
        return $this->maximumTemperature;
    }

    public function getSoilNutriments(): int|null
    {
        return $this->soilNutriments;
    }

    public function getSoilSalinity(): int|null
    {
        return $this->soilSalinity;
    }

    public function getSoilTexture(): int|null
    {
        return $this->soilTexture;
    }

    public function getSoilHumidity(): int|null
    {
        return $this->soilHumidity;
    }
}
