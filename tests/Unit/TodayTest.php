<?php

use App\Models\Family;
use App\Models\PlantType;
use App\Models\Succession;
use App\Models\SuccessionType;
use App\Models\Variety;

test('valid succession, to sow for dayOfYear, can be select from all successions', function () {
    $this->withoutExceptionHandling();

    $today = 180;


    $family = Family::factory()->create();
    $plantType = PlantType::factory()->create(['family_id'=>$family->id]);
    // $varieties = Variety::factory()->count(3)->create();
    $successionType = SuccessionType::factory()->count(3)->create();

    $this->assertCount(3,SuccessionType::all());
    
    $succession1 = Succession::factory()->create([
        'plant_type_id' => $plantType->id,
        'succession_type_id' => 1,
        'sow_start' => 50,
        'sow_end' => 100,
        'days_nursery' => 28,
        'days_maturity' => 60,
        'days_harvest' => 30,
    ]);
    $succession2 = Succession::factory()->create([
        'plant_type_id' => $plantType->id,
        'succession_type_id' => 2,
        'sow_start' => 150,
        'sow_end' => 200,
        'days_nursery' => 28,
        'days_maturity' => 60,
        'days_harvest' => 30,
    ]);
    $succession3 = Succession::factory()->create([
        'plant_type_id' => $plantType->id,
        'succession_type_id' => 3,
        'sow_start' => 250,
        'sow_end' => 300,
        'days_nursery' => 28,
        'days_maturity' => 60,
        'days_harvest' => 30,
    ]);

    $this->assertCount(3,Succession::all());
    

    $successions = Succession::all();

    foreach ($successions as $succession){
        if ($today >= $succession->sow_start && $today <= $succession->sow_end){
            $valid[] = $succession;
        }
    }
    // dd($valid);

    $this->assertEquals(1, sizeof($valid));

});

test('no successions selected from all successions when dayOfYear not in sow range', function () {
    $this->withoutExceptionHandling();

    $today = 101;


    $family = Family::factory()->create();
    $plantType = PlantType::factory()->create(['family_id'=>$family->id]);
    // $varieties = Variety::factory()->count(3)->create();
    $successionType = SuccessionType::factory()->count(3)->create();

    $this->assertCount(3,SuccessionType::all());
    
    $succession1 = Succession::factory()->create([
        'plant_type_id' => $plantType->id,
        'succession_type_id' => 1,
        'sow_start' => 50,
        'sow_end' => 100,
        'days_nursery' => 28,
        'days_maturity' => 60,
        'days_harvest' => 30,
    ]);
    $succession2 = Succession::factory()->create([
        'plant_type_id' => $plantType->id,
        'succession_type_id' => 2,
        'sow_start' => 150,
        'sow_end' => 200,
        'days_nursery' => 28,
        'days_maturity' => 60,
        'days_harvest' => 30,
    ]);
    $succession3 = Succession::factory()->create([
        'plant_type_id' => $plantType->id,
        'succession_type_id' => 3,
        'sow_start' => 250,
        'sow_end' => 300,
        'days_nursery' => 28,
        'days_maturity' => 60,
        'days_harvest' => 30,
    ]);

    $successions = Succession::all();
    // $this->assertCount(3,Succession::all());
    expect($successions)->toHaveCount(3);


    $valid = [];
    foreach ($successions as $succession){
        if ($today >= $succession->sow_start && $today <= $succession->sow_end){
            $valid[] = $succession;
        }
    }
    // dd($valid);

    // $this-> Equals(1, sizeof($valid));
    expect($valid)->toHaveCount(0);
});