<?php

use App\Models\Family;
use App\Models\Journal;
use App\Models\PlantType;
use App\Models\Succession;
use App\Models\SuccessionType;
use App\Models\Variety;
use Carbon\Carbon;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

it('records a journal entry for a sowing', function () {
    $this->withoutExceptionHandling();
    $family = Family::factory()->create();
    $plantType = PlantType::factory()->create(['family_id'=>$family->id]);
    $variety = Variety::factory()->create([
        'plant_type_id' => $plantType->id,
        'sow_direct' => false,
    ]);
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
        'sown' => today()->format('Y-m-d'),
        'succession_id' => $succession->id,
        'variety_id' => $variety->id,
    ];
    $entry = Journal::create($input);


    $this->assertEquals($entry->sown, Carbon::today());
    $this->assertEquals($entry->variety_id, $input['variety_id']);

    $this->assertCount(1, Journal::all());
    // expect(true)->toBeTrue();
});


// it('calculates the estimated plant date', function(){
it('adds plant date if sow_direct is true', function(){
        $this->withoutExceptionHandling();

    // Journal -> family, plantType, successionType, succession, varietySown
    $family = Family::factory()->create();
    $plantType = PlantType::factory()->create(['family_id'=>$family->id]);
    $variety = Variety::factory()->create([
        'plant_type_id' => $plantType->id,
        'sow_direct' => true,
    ]);
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
        'sown' => "2023-2-14",
        'variety_id' => $variety->id,
        'succession_id' => $succession->id,
        'sow_direct' => true,
    ];
    $entry = Journal::create($input); 

    assertEquals($entry->planted, $entry->sown);

    // $plantDate = $entry->estimatedCropingDate($succession->days_nursery);
    
    // $plantDOY = date_format($plantDate, 'z');

    // assertEquals(72, $plantDOY);

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
    $variety = Variety::factory()->create([
        'plant_type_id' => $plantType->id,
        'sow_direct' => true,
    ]);
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
        'sown' => "2023-2-14",
        'succession_id' => $succession->id,
        'variety_id' => $variety->id,
        // 'sow_direct' => false,
    ];
    $entry = Journal::factory()->create($input); 
  
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
    $variety = Variety::factory()->create([
        'plant_type_id' => $plantType->id,
        'sow_direct' => true,
    ]);
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
        'succession_id' => $succession->id,
        'variety_id' => $variety->id,
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
