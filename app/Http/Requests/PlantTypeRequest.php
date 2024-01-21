<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlantTypeRequest extends FormRequest
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
            'latin' => ['required'],
            'family_id' => [],
            'perennial' => ['boolean'],
            'dates_best_sow' => [],
            'dates_main_harvest' => [],
            'feeder_type' => [],
            'root_depth' => [],
            'mulch' => [],
            'fertiliser' => [],
            'when_to_fertilise' => [],
            'multisow' => [],
            'hardiness_young_plants' => [],
            'competitor' => [],
            'competition_period' => [],
            'companions' => [],
            'interplant_into' => [],
            'interplant_with' => [],
            'relay_plant_into' => [],
            'relay_plant_with' => [],
            'germ_temp_img' => ['nullable', 'mimes:jpg,png,jpeg', 'max:1024'],
            'plant_type_img' => ['nullable', 'mimes:jpg,png,jpeg', 'max:1024'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'perennial' => $this->boolean('perennial'),
        ]);
    }

    // protected function passedValidation(): void
    // {

    //     // $this->replace([
    //     //     'germ_temp_img' => $this->name . $this->germ_temp_img->extension(),
    //     // ]);
    // }
}
