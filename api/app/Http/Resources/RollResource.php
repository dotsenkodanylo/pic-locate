<?php

namespace App\Http\Resources;

use App\Models\Roll;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Roll $roll
 */
class RollResource extends JsonResource
{
    public function toArray($request)
    {
        return [
           ''
        ];
    }
}
