<?php

use App\Models\Succession;


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
    $response = $this->get(route('succession.edit'));
    $response->assertStatus(200);
});

// //update
// it('redirects to form on validation error', function(){
    
// });