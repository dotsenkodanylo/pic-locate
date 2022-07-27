<?php

namespace App\Http\Requests;

use App\Models\Camera;
use Illuminate\Foundation\Http\FormRequest;

class StoreCameraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    // Need to sanitize raw string input;
    public function rules(): array
    {
        return Camera::getRules();
    }
}
