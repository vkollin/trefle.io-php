<?php

declare(strict_types = 1);

namespace Trefle\Response\Enumeration;

enum DurationEnumeration: string
{
    case ANNUAL = 'annual';
    case BIENNIAL = 'biennial';
    case PERENNIAL = 'perennial';
}
