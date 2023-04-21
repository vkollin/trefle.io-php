<?php

declare(strict_types = 1);

namespace Trefle\Response\Enumeration;

enum EdiblePartEnumeration: string
{
    case ROOTS = 'roots';
    case STEM = 'stem';
    case LEAVES = 'leaves';
    case FLOWERS = 'flowers';
    case FRUITS = 'fruits';
    case SEEDS = 'seeds';
    case TUBERS = 'tubers';
}
