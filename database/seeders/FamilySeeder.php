<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $families = [
            ['name' => 'Allium'],
            ['name' => 'Brassica'],
            ['name' => 'Curcubit'],
            ['name' => 'Legume'],
            ['name' => 'Root'],
            ['name' => 'Salad'],
            ['name' => 'Solanacae'],
        ];

        foreach( $families as $key => $value ) {
            Family::create($value);
        }
    }
}
