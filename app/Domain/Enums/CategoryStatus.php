<?php

namespace App\Domain\Enums;

enum CategoryStatus: string
{
    case DRAFT = 'draft';
    case INACTIVE = 'inactive';
    case ACTIVE = 'active';
    case ARCHIVED = 'archived';
}
