<?php

namespace App\Models;

use App\Traits\HasNotes;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MStaack\LaravelPostgis\Eloquent\PostgisTrait;
use MStaack\LaravelPostgis\Geometries\Point;

/**
 * @property string $title
 * @property string $description
 * @property int $latitude
 * @property int $longitude
 * @property $location_geo
 * @property $location_geom
 */
class Location extends BaseModel
{
    use HasFactory, HasUuid, HasNotes, PostgisTrait;

    protected $hidden = [
        'id',
    ];

    protected $fillable = [
        'roll_id',
        'title',
        'description',
        'latitude',
        'longitude',
        'location_geo',
        'location_geom'
    ];

    protected $postgisFields = [
        'location_geo',
        'location_geom',
    ];

    protected $postgisTypes = [
        'location_geo' => [
            'geomtype' => 'geography',
            'srid' => 4326
        ],
        'location_geom' => [
            'geomtype' => 'geometry',
            'srid' => 27700
        ],

    ];

    public static array $rules = [
        'title' => 'required|string|max:40',
        'description' => 'string|max:150',
        'latitude' => 'required|between:-90,90',
        'longitude' => 'required|between:-180,180',
    ];

    public static function booted(): void
    {
        // Creating fails..... Saving works.......... Wut.
        static::saving(function (self $model) {
            $model->location_geo = new Point($model->latitude, $model->longitude);
            $model->location_geom = new Point($model->latitude, $model->longitude);
        });
    }

    public function roll(): BelongsTo
    {
        return $this->belongsTo(Roll::class);
    }
}
