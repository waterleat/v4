<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VarietyRequest extends FormRequest
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
            'name' => ['required'],
            'plant_type_id' => ['integer'],
            'info' => ['required'],
            'description' => ['required'],
            'height' => ['decimal:0,2'],
            'spread' => ['decimal:0,2'],
            'days2maturity' => ['integer'],
        ];
    }
}