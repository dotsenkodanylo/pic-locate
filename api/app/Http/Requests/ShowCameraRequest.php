<?php

namespace App\Http\Requests;

use App\Models\Camera;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property Camera $camera
 */
class ShowCameraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->owns($this->camera);
    }

    public function rules(): array
    {
        return [
        ];
    }
}
