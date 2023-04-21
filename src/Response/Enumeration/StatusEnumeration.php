<?php

declare(strict_types = 1);

namespace Trefle\Response\Enumeration;

enum StatusEnumeration: string
{
    case ACCEPTED = 'accepted';
    case UNKNOWN = 'unknown';
}
