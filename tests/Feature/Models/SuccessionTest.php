<?php

use App\Models\Family;
use App\Models\PlantType;
use App\Models\Succession;
use App\Models\SuccessionType;

it('has an empty table to start with', function() {
    $this->assertFalse(Succession::exists());
    $this->assertCount(0, Succession::all());
});

it('the succession index page route has statusCode 200', function () {
    $response = $this->get('/succession');

    $response->assertStatus(200);
});

it('has "New Succession" visible on page', function(){
    $response = $this->get('/succession');
    $response->assertSee('New Succession</a>', false);
});

it('can show the create page', function(){
    $response = $this->get(route('succession.create'));
    $response->assertStatus(200);
});


// edit
it('can show the edit page', function(){
    $family = Family::factory()->create();
    $plantType = PlantType::factory()->create(['family_id'=>$family->id]);
    $successionType = SuccessionType::factory()->create();

    
    $succession = Succession::factory()->create([
        'plant_type_id' => $plantType->id,
        'succession_type_id' => $successionType->id,
        'sow_start' => 50,
        'sow_end' => 100,
        'days_nursery' => 28,
        'days_maturity' => 60,
        'days_harvest' => 30,
    ]);
    $response = $this->get(route('succession.edit', $succession));
    $response->assertStatus(200);
});

// //update
// it('redirects to form on validation error', function(){
    
// });