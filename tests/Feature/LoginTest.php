<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    protected $user;

    public function testStatusHome()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testLoginLink()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    public function testLogin()
    {
        $response = $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticatedAs($this->user);
        $response->assertRedirect('/');
    }

    public function testLogout()
    {
        $response = $this->actingAs($this->user);
        $response->get('logout');
        $this->assertGuest();
    }
}
