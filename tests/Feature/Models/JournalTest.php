<?php

use App\Models\Journal;

use function Pest\Laravel\patch;

it('a new sowing log can be added ', function () {
    $this->withoutExceptionHandling();
    $sowing = [
        'variety' => 'Boltardy',
        'sown' => '25/12/2023',
    ];

    $response = $this->post('/journal', $sowing);

    $response->assertOk();
    $this->assertCount(1, Journal::all());
});

it('has to have a variety', function (){
    // $this->withoutExceptionHandling();
    $sowing = [
        'variety' => '',
        'sown' => '25/12/2023',
    ];
    $response = $this->post('/journal', $sowing);

    $response->assertSessionHasErrors('variety');

});

it('has to have a sown date', function (){
    // $this->withoutExceptionHandling();
    $sowing = [
        'variety' => 'Boltardy',
        'sown' => '',
    ];
    $response = $this->post('/journal', $sowing);

    $response->assertSessionHasErrors('sown');

});

it('can update a journal entry', function (){
    $this->withoutExceptionHandling();
    $sowing = [
        'variety' => 'Boltardy',
        'sown' => '25/12/2023',
    ];
    $this->post('/journal', $sowing);

    $entry = Journal::first();
    $response = patch('/journal' .'/'. $entry->id, [
        'variety' => 'sungold',
        'sown' => '1/1/2024',
    ]);

    $this->assertEquals('sungold', Journal::first()->variety);
    $this->assertEquals('1/1/2024', Journal::first()->sown);
});