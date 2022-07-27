<?php

namespace App\Enums;

enum SetType {
    case Roll;
    case Collection;
}

// SetType::Cases() -> Return all cases as array of Enum objects.
