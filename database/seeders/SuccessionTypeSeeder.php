<?php

namespace Database\Seeders;

use App\Models\SuccessionType;
use Illuminate\Database\Seeder;

class SuccessionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $successionTypes = [
            ['name' => 'Super early'],
            ['name' => 'First early'],
            ['name' => 'Second early'],
            ['name' => 'Early main'],
            ['name' => 'Extra crop'],
            ['name' => 'Mid season'],
            ['name' => 'Main crop'],
            ['name' => 'Late crop'],
            ['name' => 'Super late'],
            ['name' => 'Winter crop'],
        ];

        foreach ($successionTypes as $key => $value) {
            SuccessionType::create($value);
        }

    }
}
