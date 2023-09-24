<?php

namespace Database\Seeders;

use App\Models\SuccessionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuccessionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $successionTypes = [
            ['name' => '1) Super early'],
            ['name' => '2) First early'],
            ['name' => '3) Second early'],
            ['name' => '4) Early main crop'],
            ['name' => '4) Extra crop'],
            ['name' => '4) Mid season'],
            ['name' => '5) Main crop'],
            ['name' => '6) Late crop'],
            ['name' => '7) Super late crop'],
            ['name' => '8) Winter crop'],
        ];

        foreach( $successionTypes as $key => $value ) {
            SuccessionType::create($value);
        }    

    }
}
