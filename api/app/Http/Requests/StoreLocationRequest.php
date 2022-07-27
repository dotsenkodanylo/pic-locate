<?php

namespace App\Http\Requests;

use App\Models\Location;
use App\Models\Roll;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property Roll $roll
 */
class StoreLocationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->owns($this->roll->camera);
    }

    public function rules(): array
    {
        return Location::getRules();
    }
}
