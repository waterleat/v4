<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'succession_id' => 5,
                'sow_start' => '2023-05-12 00:00:00', 'sow_end' => '2023-06-11 00:00:00',
                'plant_start' => '2023-06-12 00:00:00', 'plant_end' => '2023-07-12 00:00:00',
                'harvest_start' => '2023-10-02 00:00:00', 'harvest_end' => '2023-11-12 00:00:00',
                'days_nursery' => 30, 'days_maturity' => 112, 'days_harvest' => 41,
                'status' => 'planned',
            ],
            [
                'succession_id' => 14,
                'sow_start' => '2023-06-11 00:00:00', 'sow_end' => '2023-07-12 00:00:00',
                'plant_start' => '2023-07-01 00:00:00', 'plant_end' => '2023-08-01 00:00:00',
                'harvest_start' => '2024-01-31 00:00:00', 'harvest_end' => '2024-04-01 00:00:00',
                'days_nursery' => 20, 'days_maturity' => 234, 'days_harvest' => 60,
                'status' => 'planned',
            ],
            [
                'succession_id' => 7,
                'sow_start' => '2023-10-11 00:00:00', 'sow_end' => '2023-11-11 00:00:00',
                'plant_start' => '2023-10-11 00:00:00', 'plant_end' => '2023-11-11 00:00:00',
                'harvest_start' => '2024-05-01 00:00:00', 'harvest_end' => '2024-06-11 00:00:00',
                'days_nursery' => 0, 'days_maturity' => 202, 'days_harvest' => 41,
                'status' => 'planned',
            ],
            [
                'succession_id' => 8,
                'sow_start' => '2023-10-21 00:00:00', 'sow_end' => '2023-11-21 00:00:00',
                'plant_start' => '2023-10-21 00:00:00', 'plant_end' => '2023-11-21 00:00:00',
                'harvest_start' => '2024-05-21 00:00:00', 'harvest_end' => '2024-06-21 00:00:00',
                'days_nursery' => 0, 'days_maturity' => 212, 'days_harvest' => 31,
                'status' => 'planned',
            ],
        ];
    }
}
