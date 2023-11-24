<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_the_successful_login_response(): void
    {
        // $pas = Hash::make('12345678');
        $loginData = ['email' => 'vero@gmail.com', 'password' => '12345678'];

        $this->json('POST', 'api/login', $loginData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
              "status",
              "message",
              "token",
            ]);

        $this->assertAuthenticated();
    }
}
