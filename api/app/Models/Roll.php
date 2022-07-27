<?php

namespace App\Models;

use App\Traits\HasNotes;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property BelongsTo $camera
 */
class Roll extends BaseModel
{
    use HasFactory, HasUuid, HasNotes;

    protected $table = 'rolls';

    protected $hidden = [
        'id'
    ];

    protected $fillable = [
        'uuid',
        'description',
        'brand',
        'type',
        'iso',
        'camera_id',
    ];

    public static array $rules = [
        'description' => 'required|string|max:50',
        'brand' => 'string|max:20',
        'type' => 'string|max:40',
        'iso' => 'required|between:0,100000'
    ];

    public function camera(): BelongsTo
    {
        return $this->belongsTo(Camera::class);
    }

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }
}
