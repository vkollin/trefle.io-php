<?php

declare(strict_types = 1);

namespace Trefle\Response\Enumeration;

enum TextureEnumeration: string
{
    case FINE = 'fine';
    case MEDIUM = 'medium';
    case COARSE = 'coarse';
}
