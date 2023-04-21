<?php

declare(strict_types = 1);

namespace Trefle\Response\Enumeration;

enum RankEnumeration: string
{
    case SPECIES = 'species';
    case SSP = 'ssp';
    case VAR = 'var';
    case FORM = 'form';
    case HYBRID = 'hybrid';
    case SUBVAR = 'subvar';
}
