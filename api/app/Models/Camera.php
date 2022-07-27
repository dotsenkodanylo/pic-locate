<?php

namespace App\Models;

use App\Traits\HasNotes;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $uuid
 * @property string $name
 * @property HasMany $rolls
 * @property BelongsTo $user
 */
class Camera extends BaseModel
{
    use HasFactory,
        HasUuid,
        HasNotes;

    protected $table = 'cameras';

    protected $hidden = [
        'id'
    ];

    protected $fillable = [
        'uuid',
        'name',
        'user_id',
    ];

    public static array $rules = [
        'name' => 'required|string|max:50'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function rolls(): HasMany
    {
        return $this->hasMany(Roll::class);
    }
}
