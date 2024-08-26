<?php

namespace Tests\Unit;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_fetches_all_posts()
    {
        $posts = Post::factory()->count(3)->create();

        $response = $this->getJson('/api/posts');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function it_creates_a_post()
    {
        $postData = [
            'title' => 'New Post Title',
            'slug' => 'new-post-title',
            'post' => 'This is the content of the post.'
        ];

        $response = $this->postJson('/api/posts', $postData);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'title' => 'New Post Title',
                     'slug' => 'new-post-title',
                     'post' => 'This is the content of the post.'
                 ]);

        $this->assertDatabaseHas('posts', $postData);
    }

    /** @test */
    public function it_fetches_a_single_post()
    {
        $post = Post::factory()->create();

        $response = $this->getJson("/api/posts/{$post->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $post->id,
                     'title' => $post->title,
                     'slug' => $post->slug,
                     'post' => $post->post,
                 ]);
    }

    /** @test */
    public function it_updates_a_post()
    {
        $post = Post::factory()->create();

        $updatedData = [
            'title' => 'Updated Post Title',
            'slug' => 'updated-post-title',
            'post' => 'This is the updated content of the post.'
        ];

        $response = $this->putJson("/api/posts/{$post->id}", $updatedData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updatedData);

        $this->assertDatabaseHas('posts', $updatedData);
    }

    /** @test */
    public function it_deletes_a_post()
    {
        $post = Post::factory()->create();

        $response = $this->deleteJson("/api/posts/{$post->id}");

        $response->assertStatus(200)
                 ->assertJson(['success' => true]);

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }

    /** @test */
    public function it_searches_posts_by_name()
    {
        $post1 = Post::factory()->create(['title' => 'Laravel Tips']);
        $post2 = Post::factory()->create(['title' => 'PHP Tricks']);
        $post3 = Post::factory()->create(['title' => 'Vue.js Basics']);

        $response = $this->getJson('/api/posts/search/laravel');

        $response->assertStatus(200)
                 ->assertJsonCount(1)
                 ->assertJsonFragment(['title' => 'Laravel Tips']);
    }
}
