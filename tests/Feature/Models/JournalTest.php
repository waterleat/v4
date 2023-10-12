<?php

use App\Models\Journal;
use Carbon\Carbon;

use function Pest\Laravel\patch;

it('a new sowing log can be added', function () {
    $this->withoutExceptionHandling();
    $sowing = [
        'variety_id' => 1,
        'sown' => '2023-12-25',   // '25/12/2023',
    ];

    $response = $this->post('/journal', $sowing);
    
    $journals = Journal::all();
    $entry = Journal::first();

    // $response->assertOk();
    $this->assertCount(1, $journals);
    $this->assertInstanceOf(Carbon::class,  $journals->first()->sown);
    $response->assertRedirect('/journal/' . $entry->id);
});

it('has to have a variety', function (){
    // $this->withoutExceptionHandling();
    $sowing = [
        'variety_id' => '',
        'sown' => '2023-12-25',   // '25/12/2023',
    ];
    $response = $this->post('/journal', $sowing);

    $response->assertSessionHasErrors('variety_id');

});

it('has to have a sown date', function (){
    // $this->withoutExceptionHandling();
    $sowing = [
        'variety_id' => 1,
        'sown' => '',
    ];
    $response = $this->post('/journal', $sowing);

    $response->assertSessionHasErrors('sown');

});

it('can update a journal entry', function (){
    $this->withoutExceptionHandling();
    $sowing = [
        'variety_id' => 1,
        'sown' => '2023-12-25',   // '25/12/2023',
    ];
    $this->post('/journal', $sowing);

    $entry = Journal::first();

    $response = patch('/journal' .'/'. $entry->id, [
        'variety_id' => 2,
        'sown' => '2024-1-11',   // '1/1/2024',
    ]);

    $this->assertEquals('2', Journal::first()->variety_id);
    $this->assertEquals(Carbon::create(2024,1,11,0,0,0), Journal::first()->sown);
    $response->assertRedirect('/journal/' . $entry->id);
});

it('can delete a journal entry', function (){
    // $this->withoutExceptionHandling();
    $sowing = [
        'variety_id' => 1,
        'sown' => '2023-12-25',
    ];
    $this->post('/journal', $sowing);

    $entry = Journal::first();
    $this->assertCount(1,Journal::all());

    $response = $this->delete('/journal' .'/'. $entry->id);

    $this->assertCount(0, Journal::all());
    $response->assertRedirect('/journal');
});