<?php

namespace App\Http\Requests;

use App\Models\Camera;
use App\Models\Roll;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property Camera $camera
 */
class StoreRollRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->owns($this->camera);
    }

    // Are there any rules that pertain to the camera perhaps?
    public function rules(): array
    {
        return Roll::getRules();
    }
}
