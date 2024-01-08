<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ['name' => 'back 1'],
            ['name' => 'back 2'],
            ['name' => 'front left 1'],
            ['name' => 'front left 2'],
            ['name' => 'front left 3'],
            ['name' => 'front right 1'],
            ['name' => 'front right 2'],
            ['name' => 'patio'],
            ['name' => 'porch'],
            ['name' => 'windowsill'],
        ];

        foreach ($locations as $key => $value) {
            Location::create($value);
        }
    }
}
