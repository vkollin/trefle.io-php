<?php

declare(strict_types = 1);

namespace Trefle\Response\Model\SubModel;

class Distributions
{
    /**
     * @param list<Distribution> $native
     * @param list<Distribution> $introduced
     * @param list<Distribution> $doubtful
     * @param list<Distribution> $absent
     * @param list<Distribution> $extinct
     *
     */
    public function __construct(
        private readonly array $native,
        private readonly array $introduced,
        private readonly array $doubtful,
        private readonly array $absent,
        private readonly array $extinct,
    ) {
    }

    public function getNative(): array
    {
        return $this->native;
    }

    public function getIntroduced(): array
    {
        return $this->introduced;
    }

    public function getDoubtful(): array
    {
        return $this->doubtful;
    }

    public function getAbsent(): array
    {
        return $this->absent;
    }

    public function getExtinct(): array
    {
        return $this->extinct;
    }
}
