<?php

use App\Models\Family;
use App\Models\PlantType;

it('can list a plant type with no family_id on index page', function(){
    $plantType = PlantType::create([
        'name' => 'weed',
        'latin' => 'xyz',
        'perennial' => false,
        'family_id' => null,
    ]);

    $response = $this->get('/plantType');

    $response->assertViewHas('plantTypes', function($collection) use ($plantType) {
        return $collection->contains($plantType);
    });

});

it('can create a new plantType', function(){
    $plantType1 = [
        'name' => 'weed',
        'latin' => 'xyz',
        'family_id' => null,
    ];
    $response = $this->post('/plantType', $plantType1);
    $response->assertStatus(302);
    $response->assertRedirect('plantType');

    $this->assertDatabaseHas('plant_types', $plantType1);
});


// edit page

it('can properly show correct values in edit page', function() {
    $family = Family::factory()->create(['name'=>'fam', 'latin'=>'id', 'description'=>'blurb']);
    $plantType = PlantType::factory()->create(['family_id' => 1]) ;

    $response = $this->get('/plantType/' . $plantType->id . '/edit');

    $response->assertStatus(200);
    $response->assertSee('value="'.$plantType->name.'"', false);
    $response->assertSee('value="'.$plantType->latin.'"', false);
    $response->assertViewHas('plantType', $plantType);
});



//update
// I don't think this is testing what I what 

it('redirects to form on validation error', function(){
    $family = Family::factory()->create(['name'=>'fam', 'latin'=>'id', 'description'=>'blurb']);
    $plantType = PlantType::factory()->create(['family_id' => 1]) ;

    $response = $this->patch('/plantType/' . $plantType->id, [
        'name' => '',
        'latin' => '',
        'family_id' => 1,
    ]);
    
    $response->assertStatus(302);
    $response->assertSessionHasErrors(['name', 'latin']);
});