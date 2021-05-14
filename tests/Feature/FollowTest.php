<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class FollowTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->user1 = factory(User::class)->create();
        $this->user2 = factory(User::class)->create();
    }

    public function testFollow()
    {
        // user2がuser1をフォロー
        $response = $this->actingAs($this->user2);
        $follow_path = route('user.follow', ['id' => $this->user1->id]);

        $response = $this->post($follow_path);
        $response->assertSessionHasNoErrors();

        $this->assertEquals(1, $this->user1->followers()->count());
        $this->assertEquals(1, $this->user2->followings()->count());

        $this->assertDatabaseHas('user_follow', [
            'user_id' => $this->user2->id,
            'follow_id' => $this->user1->id
        ]);
    }

    public function testUnfollow()
    {
        // user2がuser1をフォローした後にアンフォロー
        $response = $this->actingAs($this->user2);
        $response = $this->post(route('user.follow', ['id' => $this->user1->id]));
        $response->assertSessionHasNoErrors();

        $follow_path = route('user.unfollow', ['id' => $this->user1->id]);
        $response = $this->delete($follow_path);
        $response->assertSessionHasNoErrors();

        $this->assertEquals(0, $this->user1->followers()->count());
        $this->assertEquals(0, $this->user2->followings()->count());

        $this->assertDatabaseMissing('user_follow', [
            'user_id' => $this->user2->id,
            'follow_id' => $this->user1->id
        ]);
    }

    public function testFollowings()
    {
        $response = $this->actingAs($this->user2);
        $response = $this->post(route('user.follow', ['id' => $this->user1->id]));
        $response->assertSessionHasNoErrors();

        $response = $this->get(route('users.followings', ['id' => $this->user2->id]));
        $response->assertSessionHasNoErrors();

        $this->assertEquals(1, $this->user2->followings()->count());
    }

    public function testFollowers()
    {
        $response = $this->actingAs($this->user2);
        $response = $this->post(route('user.follow', ['id' => $this->user1->id]));
        $response->assertSessionHasNoErrors();

        $response = $this->get(route('users.followers', ['id' => $this->user1->id]));
        $response->assertSessionHasNoErrors();

        $this->assertEquals(1, $this->user1->followers()->count());
    }
}
