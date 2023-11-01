<?php

use App\Models\Family;
use App\Models\Plan;
use App\Models\PlantType;
use App\Models\Succession;
use App\Models\SuccessionType;
use App\Models\Variety;

test('a succession can be added to the plan', function () {
    // $this->withoutExceptionHandling();

    $response = $this->post('/plan', [
        'succession_id' => 1,
    ]);

    $response->assertStatus(200);
    $this->assertCount(1, Plan::all());
});

it('has to have a succession id', function () {
    // $this->withoutExceptionHandling();

    $response = $this->post('/plan', [
        'succession_id' => null,
    ]);

    $response->assertSessionHasErrors('succession_id');
});

it('can delete a planned succession', function () {
    // $this->withoutExceptionHandling();

    $response = $this->post('/plan', [
        'succession_id' => 1,
    ]);

    $response->assertStatus(200);
    $this->assertCount(1, Plan::all());
    $plan = Plan::first();

    $this->delete('plan/' . $plan->id);
    $this->assertCount(0, Plan::all());
});

it('can detect if there are no planned successions', function () {
    $this->withoutExceptionHandling();
    $response = $this->get('plan');

    $response->assertStatus(200);
    $response->assertSee('No plans available', false);
});

it('shows the plantType name and growing locn of the planned successions', function () {
    $family = Family::factory()->create();
    $plantType1 = PlantType::factory()->create(['family_id'=>$family->id]);
    $plantType2 = PlantType::factory()->create(['family_id'=>$family->id]);

    // $variety = Variety::factory()->create([
    //     'plant_type_id' => $plantType->id,
    //     'sow_direct' => false,
    // ]);
    $successionType = SuccessionType::factory()->create();
    $succession1 = Succession::factory()->create([
        'plant_type_id' => $plantType1->id,
        'succession_type_id' => $successionType->id,
        'sow_start' => 30,
        'sow_end' => 60,
        'days_nursery' => 28,
        'days_maturity' => 60,
        'days_harvest' => 30,
    ]);
    $succession2 = Succession::factory()->create([
        'plant_type_id' => $plantType2->id,
        'succession_type_id' => $successionType->id,
        'sow_start' => 30,
        'sow_end' => 60,
        'days_nursery' => 28,
        'days_maturity' => 60,
        'days_harvest' => 30,
    ]);
    $plan1 = [
        'succession_id' => $succession1->id,
        'locn_growing' => 'garden',
    ];
    $plan2 = [
        'succession_id' => $succession2->id,
        'locn_growing' => 'greenhouse',
    ];

    $response = $this->post('/plan', $plan1);
    $response = $this->post('/plan', $plan2);
    $response = $this->get('plan');

    $response->assertStatus(200);
    $response->assertSee($plantType1->name, false);
    $response->assertSee($plantType2->name, false);
    $response->assertSee('garden', false);
    $response->assertSee('greenhouse', false);
});

it('a plan must have a succession', function () {
    // error on creation of plan
    $plan = [
        'locn_growing' => 'fred',
    ];
    // dd($plan);

    $response = $this->post('/plan', $plan);
    $response->assertSessionHasErrors('succession_id');
});

it('adding a plant type adds all successions for that plant type', function () {
    // create a plantType and several successions
    $family = Family::factory()->create();
    $plantType1 = PlantType::factory()->create(['family_id'=>$family->id]);
    // $plantType2 = PlantType::factory()->create(['family_id'=>$family->id]);

    // $variety = Variety::factory()->create([
    //     'plant_type_id' => $plantType->id,
    //     'sow_direct' => false,
    // ]);
    $successionType1 = SuccessionType::factory()->create();
    $successionType2 = SuccessionType::factory()->create();
    $succession1 = Succession::factory()->create([
        'plant_type_id' => $plantType1->id,
        'succession_type_id' => $successionType1->id,
        'sow_start' => 40,
        'sow_end' => 70,
        'days_nursery' => 28,
        'days_maturity' => 60,
        'days_harvest' => 30,
    ]);
    $succession2 = Succession::factory()->create([
        'plant_type_id' => $plantType1->id,
        'succession_type_id' => $successionType2->id,
        'sow_start' => 70,
        'sow_end' => 100,
        'days_nursery' => 28,
        'days_maturity' => 60,
        'days_harvest' => 30,
    ]);

    $response = $this->post('/plan', [
        'succession_id' =>  $succession1->id,
    ]);
    $response->assertStatus(200);
    $this->assertCount(1, Plan::all());

    $response = $this->post('/plan', [
        'succession_id' =>  $succession2->id,
    ]);
    $response->assertStatus(200);
    $this->assertCount(2, Plan::all());
    
    // // add planttype via a route
    // $response = $this->get(route('plan.addPlantType', $plantType1->id));
    // dd(Plan::all());
    // // check count of plans
    // $response->assertCount(2, Plan::all());
});

it('a single plan can be deleted from list of plans', function () {
    // create a succession and add to plan
    // count = 1
    // delete via a route
    // count = 0
});

it('allows a location for germination', function () {
    // create a succession and add to plan
    // edit via a route
    // update via route
    // check plan has locn
});

it('allows a location for seedlings nursery', function () {
    // create a succession and add to plan
    // edit via a route
    // update via route
    // check plan has locn
});

it('allows a location for growing', function () {
    $this->withoutExceptionHandling();

    // create a succession and add to plan
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
    // $response = $this->post('/plan', [
    //     'succession_id' => $succession->id,
    // ]);
    // $response->assertStatus(200);
    // $this->assertCount(1, Plan::all());

    // edit via a route
    // update via route
    $plan = Plan::factory()->create([
        'succession_id' => $succession->id,
    ]);
    $plan->locn_growing = 'garden';
    dd($plan);
    
    dd($plan->toArray());

    // the above dd gives the updated version of plan
    $response = $this->patch(route('plan.update', ['plan'=>$plan]));
    // the plan in this line is the original without locn data



    dd( Plan::all());
    $this->assertCount(1, Plan::all());

    // check plan has locn
    $plan = Plan::find(1);
    // dd($plan);
    $this->assertEquals('garden', $plan->locn_growing);
})->skip();

it('can list plans by location for a given day', function () {
    // create a succession and add to plan with location fields
    // give a date during nursery period
    // check not germination locn
    // check plan has locn for nursery
    // repeat
});