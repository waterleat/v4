<?php

use App\Models\Family;
use App\Models\Journal;
use App\Models\PlantType;
use App\Models\Succession;
use App\Models\SuccessionType;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

it('records a journal entry for a sowing', function () {
    // $this->withoutExceptionHandling();

    $input = [
        'sown' => today(),
        'variety_id' => 1,
    ];
    $entry = Journal::create($input);


    $this->assertEquals($entry->sown, $input['sown']);
    $this->assertEquals($entry->variety_id, $input['variety_id']);

    $this->assertCount(1, Journal::all());
    // expect(true)->toBeTrue();
});


it('calculates the estimated plant date', function(){
    $this->withoutExceptionHandling();

    // Journal -> family, plantType, successionType, succession, varietySown
    $family = Family::factory()->create();
    $plantType = PlantType::factory()->create(['family_id'=>$family->id]);
    $successionType = SuccessionType::factory()->create();
    $succession = Succession::factory()->create([
        'plant_type_id' => $plantType->id,
        'succession_type_id' => $successionType->id,
        'sow_start' => 30,
        'sow_end' => 60,
        'days_nursery' => 28,
        'days_maturity' => 60,
        'days_harvest' => 30,
    ]);

    $input = [
        'sown' => date_create("2023-2-14"),
        'variety_id' => 1,
    ];
    $entry = Journal::create($input); 
  
    $plantDate = $entry->estimatedCropingDate($succession->days_nursery);
    $plantDOY = date_format($plantDate, 'z');

    assertEquals(72, $plantDOY);

    // sown 44
    // estimatePlantingDate
    // add nursery 28
    // plant 72

});

it('calculates the estimated first harvest date', function(){
    $this->withoutExceptionHandling();

    // Journal -> family, plantType, successionType, succession, varietySown
    $family = Family::factory()->create();
    $plantType = PlantType::factory()->create(['family_id'=>$family->id]);
    $successionType = SuccessionType::factory()->create();
    $succession = Succession::factory()->create([
        'plant_type_id' => $plantType->id,
        'succession_type_id' => $successionType->id,
        'sow_start' => 30,
        'sow_end' => 60,
        'days_nursery' => 28,
        'days_maturity' => 60,
        'days_harvest' => 30,
    ]);

    $input = [
        'sown' => date_create("2023-2-14"),
        'variety_id' => 1,
    ];
    $entry = Journal::create($input); 
  
    $harvestDate = $entry->estimatedCropingDate($succession->days_maturity);
    $harvestDOY = date_format($harvestDate, 'z');

    assertEquals(104, $harvestDOY);
    
    // sown 44
    // estimatePlantingDate
    // add nursery 28
    // plant 72

});

it('calculates the estimated last harvest date', function(){
    $this->withoutExceptionHandling();

    // Journal -> family, plantType, successionType, succession, varietySown
    $family = Family::factory()->create();
    $plantType = PlantType::factory()->create(['family_id'=>$family->id]);
    $successionType = SuccessionType::factory()->create();
    $succession = Succession::factory()->create([
        'plant_type_id' => $plantType->id,
        'succession_type_id' => $successionType->id,
        'sow_start' => 30,
        'sow_end' => 60,
        'days_nursery' => 28,
        'days_maturity' => 60,
        'days_harvest' => 30,
    ]);

    $input = [
        'sown' => date_create("2023-2-14"),
        'variety_id' => 1,
    ];
    $entry = Journal::create($input); 
  
    // $harvestDate = $entry->estimatedFirstHarvestDate($succession->days_maturity);
    $finishingDate = $entry->estimatedCropingDate($succession->days_maturity + $succession->days_harvest);
    $finishingDOY = date_format($finishingDate, 'z');

    assertEquals(134, $finishingDOY);
    
    // sown 44
    // estimatePlantingDate
    // add nursery 28
    // plant 72

});
