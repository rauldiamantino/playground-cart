<?php

namespace App\Domain\Enums;

enum InventoryAction: string
{
    case INPUT = 'input';
    case OUTPUT = 'output';
    case BALANCE = 'balance';
}
