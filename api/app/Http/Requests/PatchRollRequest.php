<?php

namespace App\Http\Requests;

use App\Models\Roll;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property Roll $roll
 */
class PatchRollRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->roll->camera()->belongsTo($this->user());
    }

    // May want to add the ability to transfer roll to a diff. camera.
    public function rules(): array
    {
        return Roll::getRules();
    }
}
