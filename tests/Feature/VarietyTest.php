<?php

use App\Models\Variety;

use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertSame;
use function PHPUnit\Framework\assertTrue;

beforeEach(function() {
    
});



it('can display variety index page', function () {
    $response = $this->get('/variety');

    $response->assertStatus(200);
});

// it('can display variety create page', function () {
//     $response = $this->get('/variety/create');

//     $response->assertStatus(200);
// });

it('can create a new variety', function () {
    $variety = Variety::factory()->create([
        'name' => 'Hello',
        'info'=>'Spinacia oleracea',
        'description' => 'desc',
        'days2maturity' => 75, 'height' => 0.3, 'spread' => 0.3

     ]);
    assertTrue(Variety::exists());
    assertCount(1, Variety::all());
});

it('can show a new variety', function () {
     // Prepare
     $variety = Variety::factory()->create([
        'name' => 'Hello',
        'info'=>'Spinacia oleracea',
        'description' => 'desc',
        'days2maturity' => 75, 'height' => 0.3, 'spread' => 0.3

     ]);
    //  dd($variety);
 
     // Act
     $response = $this->get(route('variety.index'));
  
     // Assert
     $response->assertOk();

    // $variety = Variety::factory()->create();
    // dd($variety);
    
    // $this->assertDatabaseCount('varieties', 1);

    // $response = $this->post('/login', [
    //     'email' => $variety->email,
    //     'password' => 'password',
    // ]);
});



it('can display variety show page', function () {
     // Prepare
     $variety = Variety::factory()->create([
        'name' => 'Hello',
        'info'=>'Spinacia oleracea',
        'description' => 'desc',
        'days2maturity' => 75, 'height' => 0.3, 'spread' => 0.3
    ]);

    $response = $this->get('/variety/'. $variety->id);

    $response->assertStatus(200);
});

it('can display variety edit page', function () {
     // Prepare
     $variety = Variety::factory()->create([
        'name' => 'Hello',
        'info'=>'Spinacia oleracea',
        'description' => 'desc',
        'days2maturity' => 75, 'height' => 0.3, 'spread' => 0.3
    ]);
    // ACT
    $response = $this->get('/variety/'. $variety->id.'/edit');

    $response->assertStatus(200);
});


it('can edit a variety', function() {
    // Prepare
     $variety = Variety::factory()->create([
        'name' => 'Hello',
        'info'=>'Spinacia oleracea',
        'description' => 'desc',
        'days2maturity' => 75, 'height' => 0.3, 'spread' => 0.3
    ]);
    assertTrue(Variety::exists());
    assertCount(1, Variety::all());
    // ACT
    $variety->name = 'fred';
    
    $response = $this->patch(route('variety.update', ['variety' => $variety]));
    // dd($response);

    // ASSERT
    $response->assertStatus(302);
});

it('can delete a variety', function () {
     // Prepare
     $variety = Variety::factory()->create([
        'name' => 'Hello',
        'info'=>'Spinacia oleracea',
        'description' => 'desc',
        'days2maturity' => 75, 'height' => 0.3, 'spread' => 0.3
    ]);
    // ACT
    // $response = Variety::
})
->skip()
;
