<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\User;
use App\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;
    protected $user1;
    protected $post1;
    protected $post2;

    public function setUp(): void
    {
        parent::setUp();
        $this->user1 = factory(User::class)->create([
            'id' => 1,
            'name' => 'テスト１',
            'email' => 'user1@example.com',
        ]);
        $this->post1 = factory(Post::class)->create([
            'id' => 1,
            'user_id' => 1,
        ]);
        $this->post2 = factory(Post::class)->create([
            'id' => 2,
            'user_id' => 1,
        ]);
    }

    public function testIndex()
    {
        $this->actingAs($this->user1);
        $response = $this->get('/');
        $response->assertOk()
            ->assertSee($this->post1->title, $this->post1->title);
    }

    public function testCreate()
    {
        $response = $this->actingAs($this->user1);
        $response->get('/posts/create')
            ->assertOk()
            ->assertSee('シェアする');
    }

    public function testStore()
    {
        $response = $this->actingAs($this->user1);
        Storage::fake('s3');

        $file = UploadedFile::fake()->create('test.jpg');

        $response->post('/posts', [
            'id' => $this->post1->id,
            'title' => $this->post1->title,
            'content' => $this->post1->content,
            'picture_url' => $file,
            'user_id' => $this->user1->id,
        ])
        ->assertRedirect('/');

        Storage::disk('s3')->assertExists($this->post1->profile_image);
    }

    public function testEdit()
    {
        $response = $this->actingAs($this->user1);
        $response->get('posts/'.$this->post1->id.'/edit')
            ->assertOk();
    }

    public function testUpdate()
    {
        $response = $this->actingAs($this->user1);
        $response->put('posts/'.$this->post1->id, [
            'id' => $this->post1->id,
            'title' => 'テスト',
            'content' => '投稿編集機能テスト',
            'user_id' => $this->user1->id,
        ])
        ->assertOk();
    }


    public function testDelete()
    {
        $response = $this->actingAs($this->user1);
        $response->delete('posts/'.$this->post1->id)
            ->assertRedirect('/');
    }
}
