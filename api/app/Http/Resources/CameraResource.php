<?php

namespace App\Http\Resources;

use App\Models\Camera;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Camera $camera
 */
class CameraResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
        ];
    }
}
