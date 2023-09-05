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
            ['name' => 'Medania', 'latin'=>'Spinacia oleracea',
            'description' => 'desc',
            'days2maturity' => 75, 'height' => 0.3, 'spread' => 0.3],
            ['name' => 'Greyhound', 'latin'=>'Brassica oleracea capitata',
            'description' => 'desc',
            'days2maturity' => 75, 'height' => 0.3, 'spread' => 0.3],
            ['name' => 'Sungold', 'latin' => 'Lycopersicon esculentum',
            'description' => 'desc',
            'days2maturity' => 57, 'height' => 0.9, 'spread' => 0.9],
            ['name' => 'Steak Sandwich', 'latin' => 'Lycopersicon esculentum',
            'description' => 'desc',
            'days2maturity' => 75, 'height' => 0.9, 'spread' => 0.9]
        ];

        foreach( $varieties as $key => $value ) {
            Variety::create($value);
        }    }
}
