<?php

// namespace Tests\Feature;

// // use Illuminate\Foundation\Testing\RefreshDatabase;
// use Tests\TestCase;

// class ExampleTest extends TestCase
// {
//     /**
//      * A basic test example.
//      */
//     public function test_the_application_returns_a_successful_response(): void
//     {
//         $response = $this->get('/');

//         $response->assertStatus(200);
//     }
// }


test('the application returns a successful response', function () {
    $response = $this->get('/');    

    $response->assertStatus(200);
});

/** @var \Tests\TestCase $this */
it('has home', function () {
    echo 'outputing: ' . get_class($this); // \Tests\TestCase
    // this prints out the location of this file --> outputing: P\Tests\Feature\ExampleTest
    $this->assertTrue(true);
});