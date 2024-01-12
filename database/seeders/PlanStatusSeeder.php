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
            ['name' => 'Planned', 'colour' => null],
            ['name' => 'Sown', 'colour' => 'bg-orange-400'],
            ['name' => 'Germinated', 'colour' => 'bg-yellow-500'],
            ['name' => 'Transplanted', 'colour' => 'bg-yellow-500'],
            ['name' => 'Growing', 'colour' => 'bg-green-300'],
            ['name' => 'Harvesting', 'colour' => 'bg-yellow-300'],
            ['name' => 'Finished', 'colour' => 'bg-yellow-300'],
            ['name' => 'Failed', 'colour' => 'bg-red-300'],
        ];

        foreach ($planSatuses as $key => $value) {
            PlanStatus::create($value);
        }
    }
}
