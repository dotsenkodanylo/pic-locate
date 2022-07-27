<?php

namespace App\Http\Requests;

/**
 * @mixin Camera $camera
 */

use App\Models\Camera;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property Camera $camera
 */
class UpdateCameraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->owns($this->camera);
    }

    public function rules(): array
    {
        return [
            Camera::getRules()
        ];
    }
}
