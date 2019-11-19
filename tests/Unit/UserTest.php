<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->jason('POST', '/user', ['name' => 'Sally']);

        $response
            ->assertStatus(201)
            ->assertJson(['created' => true]);

    }
}
