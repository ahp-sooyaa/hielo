<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function has_path()
    {
        $post = factory('App\Post')->create();

        $this->assertEquals('/posts/' . $post->id, $post->path());
    }

    /** @test */
    public function belongsTo_author()
    {
        $post = factory('App\Post')->create();

        $this->assertInstanceOf('App\User', $post->author);
    }

    /** @test */
    public function can_add_comment()
    {
        $post = factory('App\Post')->create();

        $comment = $post->addComment(3, 'testing Comment');

        $this->assertCount(1, $post->comments);

        $this->assertTrue($post->comments->contains($comment));
    }
}
