<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class SearchTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    public function testShowSearchForm()
    {
        $response = $this->actingAs($this->user);
        $response = $this->get(route('search.form'));
        $response->assertOk();
    }

    public function testSearch()
    {
        $response = $this->actingAs($this->user);
        $response = $this->post(route('search.index'), ['keyword' => 'サウナ']);
        $response->assertSessionHasNoErrors();
    }
}
