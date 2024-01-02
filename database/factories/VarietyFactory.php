<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variety>
 */
class VarietyFactory extends Factory
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
            'info' => fake()->words(2, true),
            'description' => fake()->sentences(2, true),
            'days2maturity' => fake()->numberBetween(30, 99),
            'height' => fake()->randomFloat(2, 0.2, 1.5),
            'spread' => fake()->randomFloat(2, 0.2, 1.5),
        ];
    }
}
