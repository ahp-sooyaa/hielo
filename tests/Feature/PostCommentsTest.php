<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostCommentsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_post_can_have_comments()
    {
        $this->signIn();

        $post = factory('App\Post')->create(['author_id' => auth()->id()]);

        $this->post($post->path() . '/comment', ['body' => 'testing comment']);

        $this->get($post->path())
            ->assertSee('testing comment');
    }

    /** @test */
    public function a_comment_requires_body()
    {
        $this->signIn();

        $post = factory('App\Post')->create(['author_id' => auth()->id()]);

        $attributes = factory('App\Comment')->raw(['body' => '']);

        $this->post($post->path() . '/comment', $attributes)->assertSessionHasErrors('body');
    }
}
