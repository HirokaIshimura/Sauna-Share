<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function testStatusHome()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testSignupLink()
    {
        $response = $this->get('/signup');
        $response->assertStatus(200);
    }

    public function testCreateUser()
    {
        $response = $this->post('/signup', [
            'name' => 'テスト',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/');
    }
}
