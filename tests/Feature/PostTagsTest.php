<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTagsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_post_can_have_tags()
    {
        $this->signIn();

        $post = factory('App\Post')->create(['author_id' => auth()->id()]);
        $tag = factory('App\Tag')->create();

        $post->tags()->attach($tag);

        $this->assertDatabaseHas('post_tag', [
            'post_id' => $post->id,
            'tag_id' => $tag->id
        ]);
    }
}
