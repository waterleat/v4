<?php

namespace Database\Seeders;

use App\Models\Variety;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VarietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $varieties = [
            ['name' => 'Boltardy', 'info' => 'Good cropper, round red roots',
            'description' => 'desc', 'plant_type_id' => 1,
            'days2maturity' => 75, 'height' => 0.9, 'spread' => 0.9],
            ['name' => 'Greyhound', 'info'=> 'Fast growing pointy cabbage',
            'description' => 'desc', 'plant_type_id' => 2,
            'days2maturity' => 75, 'height' => 0.3, 'spread' => 0.3],
            ['name' => 'Medania', 'info'=> 'over winters CD',
            'description' => 'desc', 'plant_type_id' => 3,
            'days2maturity' => 75, 'height' => 0.3, 'spread' => 0.3],
            ['name' => 'Steak Sandwich', 'info' => 'good for slicing, good flavour ',
            'description' => 'desc', 'plant_type_id' => 4,
            'days2maturity' => 75, 'height' => 0.9, 'spread' => 0.9],
            ['name' => 'Sungold', 'info' => 'early heavy cropper, sweet, thin skins',
            'description' => 'desc', 'plant_type_id' => 4,
            'days2maturity' => 57, 'height' => 0.9, 'spread' => 0.9],
        ];

        foreach( $varieties as $key => $value ) {
            Variety::create($value);
        }
    }
}
