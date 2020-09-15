<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ManagePostsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function guests_cannot_create_posts()
    {
        $attributes = factory('App\Post')->raw();

        $this->post('/posts', $attributes)->assertRedirect('login');
        $this->get('/posts/create', $attributes)->assertRedirect('login');
    }

    /** @test */
    public function an_authenticated_user_cannot_edit_post_of_others()
    {
        //
    }

    /** @test */
    public function an_authenticated_user_cannot_delete_post_of_others()
    {
        //
    }

    /** @test */
    public function a_user_can_create_a_post()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $this->get('/posts/create')->assertStatus(200);

        $attributes = [
            'title' => $this->faker->sentence,
            'excerpt' => $this->faker->sentence,
            'content' => $this->faker->paragraph
            // 'status' => $this->faker->numberBetween('0', '2'),
            // 'published_at' => $this->faker->date()
        ];

        $this->post('/posts', $attributes)->assertRedirect('/posts');

        $this->assertDatabaseHas('posts', $attributes);

        $this->get('/posts')->assertSee($attributes['title']);
    }

    /** @test */
    public function a_user_can_view_a_post()
    {
        $this->signIn();

        $this->withoutExceptionHandling();

        $post = factory('App\Post')->create();

        $this->get($post->path())
            ->assertSee($post->title)
            ->assertSee($post->content);
    }

    /** @test */
    public function a_post_requires_a_title()
    {
        // $this->actingAs(factory('App\User')->create());
        $this->signIn();

        $attributes = factory('App\Post')->raw(['title' => '']);

        $this->post('/posts', $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_post_requires_a_content()
    {
        $this->signIn();

        $attributes = factory('App\Post')->raw(['content' => '']);

        $this->post('/posts', $attributes)->assertSessionHasErrors('content');
    }

    /** @test */
    public function a_post_requires_a_excerpt()
    {
        $this->signIn();

        $attributes = factory('App\Post')->raw(['excerpt' => '']);

        $this->post('/posts', $attributes)->assertSessionHasErrors('excerpt');
    }

    // /** @test */
    // public function a_post_requires_a_preview_image()
    // {
    //     Storage::fake('local');

    //     $file = UploadedFile::fake()->image('testing.jpg');

    //     $this->post('/posts', [
    //         'avatar' => $file,
    //     ]);

    //     Storage::disk('local')->assertExists($file->hashName());
    // }
}
