<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
        // Below are the actual tests
        $response->assertStatus(200);
        $response->assertSee("Laravel");
        $response->assertSee("Login");
        $response->assertSee("Register");

    }
}
