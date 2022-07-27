<?php

namespace App\Http\Requests;

use App\Models\Roll;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property  Roll $roll
 */
class ShowRollRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->owns($this->roll);
    }

    public function rules(): array
    {
        return [
        ];
    }
}
