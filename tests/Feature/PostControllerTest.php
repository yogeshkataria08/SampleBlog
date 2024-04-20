<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test index method to ensure it returns the correct view with posts data.
     */
    public function testIndex()
    {
        // Create test data
        $posts = Post::factory()->count(3)->create();

        // Send GET request to index route
        $response = $this->get(route('post.index'));

        // Assert response status and view
        $response->assertStatus(200);
        $response->assertViewIs('posts.index');
        $response->assertViewHas('posts', $posts);
    }

    /**
     * Test create method to ensure it returns the create view.
     */
    public function testCreate()
    {
        // Send GET request to create route
        $response = $this->get(route('post.create'));

        // Assert response status and view
        $response->assertStatus(200);
        $response->assertViewIs('posts.create');
    }

    /**
     * Test store method to ensure it creates a post and redirects to the index page.
     */
    public function testStore()
    {
        // Create post data
        $postData = Post::factory()->make()->toArray();

        // Send POST request to store route
        $response = $this->post(route('post.store'), $postData);

        // Assert database has the new post
        $this->assertDatabaseHas('posts', $postData);

        // Assert redirect to index route
        $response->assertRedirect(route('post.index'));
    }

    /**
     * Test destroy method to ensure it deletes a post and redirects to the index page.
     */
    public function testDestroy()
    {
        // Create a post
        $post = Post::factory()->create();

        // Send DELETE request to destroy route
        $response = $this->delete(route('post.destroy', $post->id));

        // Assert post is deleted from the database
        $this->assertDeleted('posts', ['id' => $post->id]);

        // Assert redirect to index route
        $response->assertRedirect(route('post.index'));
    }

    /**
 * Test show method to ensure it returns the correct view with post data.
 */
public function testShow()
{
    // Create a post
    $post = Post::factory()->create();

    // Send GET request to show route
    $response = $this->get(route('post.show', $post->id));

    // Assert response status and view
    $response->assertStatus(200);
    $response->assertViewIs('posts.show');
    $response->assertViewHas('post', $post);
}

/**
 * Test edit method to ensure it returns the edit view with post data.
 */
public function testEdit()
{
    // Create a post
    $post = Post::factory()->create();

    // Send GET request to edit route
    $response = $this->get(route('post.edit', $post->id));

    // Assert response status and view
    $response->assertStatus(200);
    $response->assertViewIs('posts.edit');
    $response->assertViewHas('post', $post);
}

/**
 * Test update method to ensure it updates a post and redirects to the index page.
 */
public function testUpdate()
{
    // Create a post
    $post = Post::factory()->create();

    // New post data
    $newData = [
        'title' => 'Updated Title',
        'content' => 'Updated Content',
    ];

    // Send PUT request to update route
    $response = $this->put(route('post.update', $post->id), $newData);

    // Assert database has the updated post
    $this->assertDatabaseHas('posts', $newData);

    // Assert redirect to index route
    $response->assertRedirect(route('post.index'));
}

}
