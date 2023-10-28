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
            'perennial' => fake()->boolean(), 
            'dates_best_sow' => fake()->word(), 
            'dates_main_harvest' => fake()->word(), 
            'feeder_type' => fake()->word(), 
            'root_depth'=> fake()->words(2, true),
            'mulch'=> fake()->words(2, true),
            'fertiliser'=> fake()->words(2, true),
            'when_to_fertilise'=> fake()->words(2, true),
            'multisow' => fake()->biasedNumberBetween(1, 6, 'sqrt'), 
            'hardiness_young_plants'=> fake()->words(2, true),
            'competitor'=> fake()->words(2, true),
            'competition_period'=> fake()->words(2, true),
            'companions' => fake()->word(),
            'interplant_into' => fake()->word(),
            'interplant_with' => fake()->word(),
            'relay_plant_into' => fake()->word(),
            'relay_plant_with' => fake()->word(),
            'germ_temp_img' => null,
        ];
    }
}
    