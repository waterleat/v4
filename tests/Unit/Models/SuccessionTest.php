<?php

use App\Models\Succession;



beforeEach(function(){
    $this->sampleData = [
        'name' => 'Early main', 
        'type' => 'Beetroot',
        'variety' => 'Boltardy', 
        'sow' => 'Mid Apr', 
        'plant' => 'Mid May',
        'firstHarvest' => 'Early Aug', 
        'lastHarvest' => 'Late Sep'
    ];
});

it('can create a new succession', function () {
    $this->succession = Succession::factory()->create($this->sampleData);
    expect(Succession::exists())->toBeTrue();
    $this->assertTrue(Succession::exists());
    $this->assertCount(1, Succession::all());
    
    $record = Succession::find(1);
    // dd($record);
    $this->assertDatabaseHas('successions', $this->sampleData);

});