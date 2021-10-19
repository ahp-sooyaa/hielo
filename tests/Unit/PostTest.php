<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() :void
    {
        parent::setUp();

        $this->post = create('App\Post');        
    }

    public function testPostHasPath()
    {
        $this->assertEquals("/posts/{$this->post->id}", $this->post->path());
    }

    public function testPostBelongsToAuthor()
    {
        $this->assertInstanceOf('App\User', $this->post->author);
    }

    public function testPostHasManyComments()
    {
        $this->assertInstanceOf(Collection::class, $this->post->comments);
    }

    public function testPostBelongsToTags()
    {
        $this->assertInstanceOf(Collection::class, $this->post->tags);
    }
}