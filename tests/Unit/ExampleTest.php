<?php

// namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

// class ExampleTest extends TestCase
// {
    //     /**
    //      * A basic test example.
    //      */
    //     public function test_that_true_is_true(): void
//     {
    //         $this->assertTrue(true);
    //     }
// }

it('assert true is true', function () {
    $this->assertTrue(true);
});

it('can sum 2 numbers', function () {
    // PREPARE
    
    // ACT
    $sum = 2+5;
    // ASSERT
    $this->assertEquals($sum, 7);
});
