<?php

declare(strict_types = 1);

namespace Trefle\Response\Enumeration;

enum ToxicityEnumeration: string
{
    case NONE = 'none';
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';
}
