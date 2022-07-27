<?php

namespace App\Http\Resources;

use App\Models\Location;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Location $location
 */
class LocationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'location_geo' => $this->location_geo,
            'location_geom' => $this->location_geom,
        ];
    }
}
