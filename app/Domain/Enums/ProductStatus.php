<?php

namespace App\Domain\Enums;

enum ProductStatus: string
{
    case DRAFT = 'draft';
    case INACTIVE = 'inactive';
    case ACTIVE = 'active';
    case ARCHIVED = 'archived';
}
