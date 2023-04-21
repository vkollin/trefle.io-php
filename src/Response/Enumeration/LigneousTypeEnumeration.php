<?php

declare(strict_types = 1);

namespace Trefle\Response\Enumeration;

enum LigneousTypeEnumeration: string
{
    case LIANA = 'liana';
    case SHRUB = 'shrub';
    case TREE = 'tree';
    case SUBSHRUB = 'subshrub';
    case PARASITE = 'parasite';
}
