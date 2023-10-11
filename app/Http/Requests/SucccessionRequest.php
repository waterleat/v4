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
            'varieties_recommended' => [],
            'cd' => ['boolean'],
            'sow' => [],
            'plant' => [],
            'first_harvest' => [],
            'last_harvest' => [],
            'sow_start' => [],
            'sow_end' => [],
            'plant_start' => [],
            'plant_end' => [],
            'harvest_start' => [],
            'harvest_end' => [], 
            'start_seeds' => [],
            'grow_seedlings' => [],
            'grow_plants' => [],
            'planting_density' => [],
            'variety_notes' => [],
            'growing_notes' => [],
            'yield_notes' => [],

        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'cd' => $this->boolean('cd'),
        ]);
    }
}
