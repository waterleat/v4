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
    $response->assertSee('No plans availible', false);
});

it('can detect if there are planned successions', function () {
    // $family = Family::factory()->create();
    // $plantType = PlantType::factory()->create(['family_id'=>$family->id]);
    // $variety = Variety::factory()->create([
    //     'plant_type_id' => $plantType->id,
    //     'sow_direct' => false,
    // ]);
    // $successionType = SuccessionType::factory()->create();
    // $succession = Succession::factory()->create([
    //     'plant_type_id' => $plantType->id,
    //     'succession_type_id' => $successionType->id,
    //     'sow_start' => 30,
    //     'sow_end' => 60,
    //     'days_nursery' => 28,
    //     'days_maturity' => 60,
    //     'days_harvest' => 30,
    // ]);
    // $plan = [
    //     'succession_id' => $succession->id,
    // ];

    $plan = [
        'succession_id' => 1,
    ];
    // dd($plan);

    $response = $this->post('/plan', $plan);
    $response = $this->get('plan');

    $response->assertStatus(200);
    $response->assertSee('some', false);
});
