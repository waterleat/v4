<?php

use App\Models\Family;

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('can create a new family', function(){
    $family1 = [
        'name' => 'weed',
        'latin' => 'xyz',
        'description' => 'fred',
    ];
    $response = $this->post('/family', $family1);
    $response->assertStatus(302);
    $response->assertRedirect('family');

    $this->assertDatabaseHas('families', $family1);
});

it('must have a name for the family', function(){
    $family1 = [
        'name' => '',
        'latin' => 'xyz',
        'description' => 'fred',
    ];
    $response = $this->post('/family', $family1);
    $response->assertSessionHasErrors('name');
    // $response->assertRedirect('family');

    // $this->assertDatabaseHas('families', $family1);
});

it('allows  latin and description to be blank', function(){
    $family1 = [
        'name' => 'weed',
    ];
    $response = $this->post('/family', $family1);
    $response->assertStatus(302);
    $response->assertRedirect('family');

    $this->assertDatabaseHas('families', $family1);
});

it('all fields of family can be edited', function(){
    // $this->withoutExceptionHandling();

    $family1 = [
        'name' => 'weed',
        'latin' => 'xyz',
        'description' => 'fred',
    ];
    Family::create($family1); //$this->post('/family', $family1);
    $post1 = Family::first();
    
    $family2 = [
        'name' => 'star',
        'latin' => 'abc',
        'description' => 'tom',
    ];

    $response = $this->patch('family/'. $post1->id, $family2);

    $this->assertEquals($family2['name'], Family::first()->name);
    $this->assertEquals($family2['latin'], Family::first()->latin);
    $this->assertEquals($family2['description'], Family::first()->description);
});

it('can delete a family', function(){
    $family1 = [
        'name' => 'weed',
        'latin' => 'xyz',
        'description' => 'fred',
    ];
    $response = $this->post('/family', $family1);
    $fam = Family::first();
    $this->assertCount(1, Family::all());

    $this->delete('family/' . $fam->id);

    $this->assertCount(0, Family::all());
});

// test for the rendering of views
// index
it('can show index page', function(){
    $family1 = [
        'name' => 'On bathing well',
        'latin' => 'xyz',
        'description' => 'fred',
    ];
    $family2 = [
        'name' => 'There\'s no time like bathtime',
        'latin' => 'abc',
        'description' => 'tom',
    ];
    Family::create($family1);
    Family::create($family2); //['name' => 'There\'s no time like bathtime']);
    $response = $this->get('/family');
    $response->assertOk();
    $response->assertsee('On bathing well');
    $response->assertSee('There\'s no time like bathtime');
    //     'families', function ($families) {
    //     $this->assertEquals(2, count($families));
    // });
});
// show
it('can show the show page', function(){
    $family1 = [
        'name' => 'weed',
        'latin' => 'xyz',
        'description' => 'fred',
    ];
    $fam = Family::create($family1);
    $response = $this->get('family/' . $fam->id);
    $response->assertOk();
    $response->assertsee('weed');
});
// create
// edit