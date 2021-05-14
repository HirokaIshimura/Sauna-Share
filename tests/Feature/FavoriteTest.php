<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Post;

class FavoriteTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->user1 = factory(User::class)->create([
            'id' => 1,
        ]);
        $this->user2 = factory(User::class)->create([
            'id' => 2,
        ]);
        $this->post1 = factory(Post::class)->create([
            'id' => 1,
            'user_id' => 2,
        ]);
    }

    public function testFavorite()
    {
        $response = $this->actingAs($this->user1);
        $favorite_path = route('favorite.posts', ['id' => $this->post1->id]);
        $response = $this->post($favorite_path);
        $response->assertSessionHasNoErrors();

        $this->assertEquals(1, $this->user1->favorites()->count());

        $this->assertDatabaseHas('favorite_posts', [
            'user_id' => $this->user1->id,
            'post_id' => $this->post1->id,
        ]);
    }

    public function testUnfavorite()
    {
        $response = $this->actingAs($this->user1);
        $response = $this->post(route('favorite.posts', ['id' => $this->post1->id]));
        $response->assertSessionHasNoErrors();

        $favorite_path = route('unfavorite.posts', ['id' => $this->post1->id]);
        $response = $this->delete($favorite_path);
        $response->assertSessionHasNoErrors();

        $this->assertEquals(0, $this->user1->favorites()->count());
        $this->assertDatabaseMissing('favorite_posts', [
            'user_id' => $this->user1->id,
            'post_id' => $this->post1->id,
        ]);
    }

    public function testFavorites()
    {
        $response = $this->actingAs($this->user1);
        $response = $this->post(route('favorite.posts', ['id' => $this->post1->id]));
        $response->assertSessionHasNoErrors();

        $response = $this->get(route('users.favorites', ['id' => $this->user1->id]));
        $response->assertSessionHasNoErrors();
    }
}
