<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlantType>
 */
class PlantTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'latin'=> fake()->words(2, true),
            'family_id' => fake()->randomDigitNotNull(),
            // 'description' => 'desc',
            // 'days2maturity' => 75, 'height' => 0.3, 'spread' => 0.3

            //
        ];
    }
}
