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
            'name' => 'Hello',
            'info'=>'Spinacia oleracea',
            'description' => 'desc',
            'days2maturity' => 75, 'height' => 0.3, 'spread' => 0.3

            //
        ];
    }
}
