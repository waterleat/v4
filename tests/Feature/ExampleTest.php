<?php

use App\Models\PlantType;

test('plantType route to index returns statusCode 200', function () {
    $response = $this->get('/plantType');

    $response->assertStatus(200);
});

it('has an empty table to start with', function () {
    $this->assertFalse(PlantType::exists());
    $this->assertCount(0, PlantType::all());
});

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

/** @var \Tests\TestCase $this */
it('has home', function () {
    echo 'outputing: '.get_class($this); // \Tests\TestCase
    // this prints out the location of this file --> outputing: P\Tests\Feature\ExampleTest
    $this->assertTrue(true);
});
