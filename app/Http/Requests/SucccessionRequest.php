<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SucccessionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'succession_type_id' => ['integer'],
            'plant_type_id' => ['integer'],
            'sow' => [],
            'plant' => [],
            'firstHarvest' => [],
            'lastHarvest' => [],
            'varieties' => [],
        ];
    }
}