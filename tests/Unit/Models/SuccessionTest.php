<?php

use App\Models\Family;
use App\Models\PlantType;
use App\Models\Succession;
use App\Models\SuccessionType;

it('can create a new succession', function () {
    $this->withoutExceptionHandling();

    $family = Family::factory()->create();
    $plantType = PlantType::factory()->create(['family_id'=>$family->id]);
    $successionType = SuccessionType::factory()->create();
    $sampleData = [
        'succession_type_id' => $successionType->id, 
        'plant_type_id' => $plantType->id,
        'varieties_recommended' => 'Boltardy', 
        'sow' => 'Mid Apr', 
        'plant' => 'Mid May',
        'first_harvest' => 'Early Aug', 
        'last_harvest' => 'Late Sep',
        'cd' => 0,
        'days_nursery' => 28,
        'days_maturity' => 60,
        'days_harvest' => 30,
    ];
    $succession = Succession::create($sampleData);
    // dd($succession);
    
    expect(Succession::exists())->toBeTrue();
    $this->assertTrue(Succession::exists());
    $this->assertCount(1, Succession::all());
    
    $record = Succession::find(1);
    // dd($record);
    $this->assertDatabaseHas('successions', $sampleData);

});