<?php

namespace Database\Seeders;

use App\Models\PlanStatus;
use Illuminate\Database\Seeder;

class PlanStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $planSatuses = [
            ['name' => 'Planned', 'colour' => 'yellow-300'],
            ['name' => 'Sown', 'colour' => 'orange-700'],
            ['name' => 'Germinated', 'colour' => 'yellow-300'],
            ['name' => 'Growing', 'colour' => 'yellow-300'],
            ['name' => 'Harvesting', 'colour' => 'yellow-300'],
            ['name' => 'Finished', 'colour' => 'yellow-300'],
            ['name' => 'Failed', 'colour' => 'yellow-300'],
        ];

        foreach ($planSatuses as $key => $value) {
            PlanStatus::create($value);
        }
    }
}
