<?php

declare(strict_types = 1);

namespace Trefle\Response;

use Trefle\Response\Model\Links;
use Trefle\Response\Model\Meta;

abstract class SearchResponse extends Response
{
    public function __construct(
        Meta                   $meta,
        private readonly Links $links,
    ) {
        parent::__construct($meta);
    }

    public function getLinks(): Links
    {
        return $this->links;
    }
}
