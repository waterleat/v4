<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJournalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    public function prepareForValidation( ): void
    {
        $this->merge([
            'sown' => $this->sown[0],
            'planted' => ($this->sow_direct) ? $this->sown[0] : null,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // 'plant_type_id' => ['required'],
            'succession_id' => ['required'],
            'variety_id' => ['required'],
            'sown' => ['required'],
            'variety' => [],
            'planted' => [],
            'first_harvest' => [],
            'last_harvest' => [],
        ];
    }
}
