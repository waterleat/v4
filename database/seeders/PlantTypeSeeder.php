<?php

namespace Database\Seeders;

use App\Models\PlantType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plantTypes = [
            ['name' => 'Beetroot', 'latin' => 'Beta vulgaris', 'family_id' => 2],
            ['name' => 'Broad Bean', 'latin' => 'Fava', 'family_id' => 9],
            ['name' => 'Cabbage', 'latin'=>'Brassica oleracea capitata', 'family_id' => 3],
            ['name' => 'Spinach', 'latin'=>'Spinacia oleracea', 'family_id' => 2],
            ['name' => 'Tomato', 'latin' => 'Lycopersicon esculentum', 'family_id' => 10],
        ];

        foreach( $plantTypes as $key => $value ) {
            PlantType::create($value);
        }    
        
    }
    
}
