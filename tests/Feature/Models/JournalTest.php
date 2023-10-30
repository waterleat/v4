<?php

use App\Models\Family;
use App\Models\Journal;
use App\Models\PlantType;
use App\Models\Succession;
use App\Models\SuccessionType;
use App\Models\Variety;
use Carbon\Carbon;


beforeEach(function() {
    
});


it('has "New Journal" visible on page', function(){
    $response = $this->get('/journal');

    $response->assertStatus(200);
    $response->assertSee('New Journal</a>', false);
});

it('can show the new sowing page', function(){
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
    $response = $this->get(route('journal.newSowing', ['sid' => $succession->id]));
    $response->assertStatus(200);
});

// use function Pest\Laravel\patch;

it('a new sowing log can be added', function () {
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
    $sowing = [
        // 'plant_type_id' => $plantType->id,
        'succession_id' => $succession->id,
        'variety_id' => $variety->id,
        'variety' => '',
        'sown' => '2023-12-25',   // '25/12/2023',
        'planted' => '',
        'first_harvest' => '',
        'last_harvest' => '',
        'sow_direct' => false,
    ];
    // dd($sowing);
    // $response = $this->post('/journal/newsowing', $sowing);
    $entry = Journal::factory()->create($sowing);

    // $journals = Journal::all();
    $found = Journal::all();

    // $response->assertOk();
    $this->assertCount(1, $found);
    $this->assertInstanceOf(Carbon::class,  $found->first()->sown);
    // $response->assertRedirect('/journal/' . $found->id);
});

it('has to have a succession_id', function (){
    // $this->withoutExceptionHandling();
    $family = Family::factory()->create();
    $plantType = PlantType::factory()->create(['family_id'=>$family->id]);
    $variety = Variety::factory()->create([
        'plant_type_id' => $plantType->id,
        'sow_direct' => false,
    ]);
    $successionType = SuccessionType::factory()->create();
    $succession = Succession::factory()->create([
        'succession_type_id' => $successionType->id, 'plant_type_id' => $plantType->id]);

    $sowing = [
        'succession_id' =>  '',
        'variety_id' => $variety->id,
        'sown' => '2023-12-25',   // '25/12/2023',
        'planted' => '',
        'first_harvest' => '',
        'last_harvest' => '',
    ];
    $response = $this->post('/journal', $sowing);

    $response->assertSessionHasErrors('succession_id');

});

it('the journal edit page route has statusCode 200', function () {
    $this->withoutExceptionHandling();
    $family = Family::factory()->create();
    $plantType = PlantType::factory()->create(['family_id'=>$family->id]);
    $variety = Variety::factory()->create([
        'plant_type_id' => $plantType->id,
        'sow_direct' => false,
    ]);
    $successionType = SuccessionType::factory()->create();
    $succession = Succession::factory()->create([
        'succession_type_id' => $successionType->id, 
        'plant_type_id' => $plantType->id
    ]);
    $sowing = Journal::factory()->create([
        'succession_id' => $succession->id,
        'variety_id' => $variety->id,
        'sown' => '2023-12-25',   // '25/12/2023',
        'planted' => '',
        'first_harvest' => '',
        'last_harvest' => '',
        'sow_direct' => false,
    ]);
    // dd($sowing);
    $response = $this->get('journal/'.$sowing->id.'/edit');

    $response->assertStatus(200);
});

it('has to have a sown date', function (){
    $this->withoutExceptionHandling();

    $family = Family::factory()->create();
    $plantType = PlantType::factory()->create(['family_id'=>$family->id]);
    $variety = Variety::factory()->create([
        'plant_type_id' => $plantType->id,
        'sow_direct' => false,
    ]);
    $successionType = SuccessionType::factory()->create();
    $succession = Succession::factory()->create([
        'succession_type_id' => $successionType->id, 'plant_type_id' => $plantType->id]);
    $sowing = [
        'succession_id' => $succession->id,
        'variety_id' => $variety->id,
        'sown' => '',
        'planted' => '',
        'first_harvest' => '',
        'last_harvest' => '',
    ];
    $response = $this->post('/journal', $sowing);
    // dd($response);

    $response->assertSessionHasErrors('sown');

})->skip();

it('can update a journal entry', function (){
    $this->withoutExceptionHandling();

    $family = Family::factory()->create();
    $plantType = PlantType::factory()->create(['family_id'=>$family->id]);
    $varieties = Variety::factory(2)->create([
        'plant_type_id' => $plantType->id,
        'sow_direct' => false,
    ]);
    $successionType = SuccessionType::factory()->create();
    $succession = Succession::factory()->create([
        'succession_type_id' => $successionType->id, 'plant_type_id' => $plantType->id]);
    $sowing = [
        'succession_id' => $succession->id,
        'variety_id' => $varieties->first()->id,
        'sown' => '2023-12-25',   // '25/12/2023',
        'planted' => '',
        'first_harvest' => '',
        'last_harvest' => '',
    ];
    $this->post('/journal', $sowing);

    $entry = Journal::first();

    $response = $this->patch('/journal' .'/'. $entry->id, [
        'succession_id' => 1,
        'variety_id' => $varieties->last()->id,
        'sown' => '2024-1-11',   // '1/1/2024',
        'planted' => '',
        'first_harvest' => '',
        'last_harvest' => '',
    ]);

    $this->assertEquals('2', Journal::first()->variety_id);
    $this->assertEquals(Carbon::create(2024,1,11,0,0,0), Journal::first()->sown);
    $response->assertRedirect('/journal/' . $entry->id);
});

it('can delete a journal entry', function (){
    // $this->withoutExceptionHandling();
    $family = Family::factory()->create();
    $plantType = PlantType::factory()->create(['family_id'=>$family->id]);
    $varieties = Variety::factory(2)->create([
        'plant_type_id' => $plantType->id,
        'sow_direct' => false,
    ]);
    $successionType = SuccessionType::factory()->create();
    $succession = Succession::factory()->create([
        'succession_type_id' => $successionType->id, 'plant_type_id' => $plantType->id]);
    $sowing = [
        'succession_id' => $succession->id,
        'variety_id' => $varieties->last()->id,
        'sown' => '2023-12-25',
        'planted' => '',
        'first_harvest' => '',
        'last_harvest' => '',
    ];
    $this->post('/journal', $sowing);

    $entry = Journal::first();
    $this->assertCount(1,Journal::all());

    $response = $this->delete('/journal' .'/'. $entry->id);

    $this->assertCount(0, Journal::all());
    $response->assertRedirect('/journal');
});