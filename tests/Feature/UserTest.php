<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    protected $user1;
    protected $user2;

    public function setUp(): void
    {
        parent::setUp();
        $this->user1 = factory(User::class)->create([
            'id' => 1,
            'name' => 'テスト１',
            'email' => 'user1@example.com',
        ]);
        $this->user2 = factory(User::class)->create([
            'id' => 2,
            'name' => 'テスト２',
            'email' => 'user2@example.com',
        ]);
    }

    public function testIndex()
    {
        $this->actingAs($this->user1);
        $this->actingAs($this->user2);
        $response = $this->get(route('users.index'));
        $response->assertOk()
            ->assertSee('テスト１', 'テスト２');
    }

    public function testShow()
    {
        $response = $this->actingAs($this->user1);
        $response = $this->get('/users/1');
        $response->assertOk()
            ->assertSee('マイシェア')
            ->assertSee('フォロー');
    }

    public function testEdit()
    {
        $response = $this->actingAs($this->user1);
        $response = $this->get('/users/1/edit');
        $response->assertOk()
            ->assertSee('プロフィール編集');
    }

    public function testUpdate()
    {
        $response = $this->actingAs($this->user1);
        Storage::fake('s3');
        $file = UploadedFile::fake()->create('test.jpg');
        $response = $this->put('/users/1', [
            'name' => 'ユーザー３',
            'profile_image' => $file,
        ]);
        Storage::disk('s3')->assertExists($this->user1->profile_image);
        $response->assertRedirect('/users/1');
    }

    public function testDelete()
    {
        $response = $this->actingAs($this->user1);
        $response->delete('/users/1');
        $this->assertInvalidCredentials([
            'email' => 'user1@example.com',
            'password' => 'password',
        ]);
    }
}
