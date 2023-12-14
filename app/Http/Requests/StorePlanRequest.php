<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanRequest extends FormRequest
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
            'succession_id' => ['required'],
            'sow_start' => [],
            'sow_end' => [],
            'plant_start' => [],
            'plant_end' => [],
            'harvest_start' => [],
            'harvest_end'=> [],
            'days_nursery' => [],
            'days_maturity' => [],
            'days_harvest' => [],
            // 'sow' => [],
            // 'plant' => [],
            // 'first_harvest' => [],
            // 'last_harvest' => [],
            'sown' => [],
            'locn_sowing' => [],
            'germinated' => [],
            'locn_nursery' => [],
            'planted' => [],
            'locn_growing' => [],
            'first_cropped' => [],
            'last_cropped' => [],
            'status' => ['required'],
        ];
    }
}
