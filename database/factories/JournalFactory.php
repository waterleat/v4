<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Journal>
 */
class JournalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'plant_type_id' => 1,
            // 'succession_type_id' => 1,
            'succession_id' => 1,
            'variety_id' => 1,
            'variety' => fake()->word(),
            'sown'=> fake()->date('Y-m-d'),
            'planted' => null,
            'first_harvest' => null,
            'last_harvest' => null,

        ];
    }
}
