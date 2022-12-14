<?php

namespace App\Traits;

use App\Models\Note;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin Model
 */
trait HasNotes
{
    public function notes(): MorphMany
    {
        return $this->morphMany(Note::class, 'noteable');
    }
}
