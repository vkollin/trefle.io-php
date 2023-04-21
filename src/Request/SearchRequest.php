<?php

declare(strict_types = 1);

namespace Trefle\Request;

class SearchRequest extends Request
{
    private ?string $query = null;

    private int $limit = 10;

    public function setQuery(string $query): static
    {
        $this->query = $query;

        return $this;
    }

    public function setLimit(int $limit): static
    {
        $this->limit = $limit;

        return $this;
    }

    public function getParameters(): array
    {
        $parameters = parent::getParameters();

        return [
            ...$parameters,
            'q' => $this->query,
            'limit' => $this->limit,
        ];
    }
}
