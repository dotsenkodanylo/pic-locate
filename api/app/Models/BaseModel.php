<?php

namespace App\Models;

use App\Traits\HasClassValidation;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    // Overwriting properties assigned within a Trait cannot be done. However, extending a class that uses this trait
    // and then modifying it IS indeed feasible and doable.
    use HasClassValidation;
}
