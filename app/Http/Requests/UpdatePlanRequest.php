<?php

namespace App\Http\Requests;

use App\Enums\JournalStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdatePlanRequest extends FormRequest
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
            'sow_start' => ['required'],
            'sow_end' => ['required'],
            'plant_start' => ['required'],
            'plant_end' => ['required'],
            'harvest_start' => ['required'],
            'harvest_end' => ['required'],
            'days_nursery' => ['numeric'],
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
            'status' => [new Enum(JournalStatusEnum::class)],
        ];
    }

    public function prepareForValidation(): void
    {
        if ($this->days_nursery == null) {
            $this->merge([
                'days_nursery' => 0,
            ]);
        }
        // dd($this);
    }
}
