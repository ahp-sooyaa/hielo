<?php
namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanSeeAllPublishedPosts()
    {
        $post = create('App\Post');
        $this->get('/posts')
            ->assertSee($post->title);
    }

    public function testUserCanSeeSinglePublishedPost()
    {
        $post = create('App\Post');

        $this->get("/posts/$post->id")
            ->assertSee($post->title);
    }

    public function testUserCanNotSeeUnpublishedPosts()
    {
        //
    }

    public function testGuestCannotCreatePost()
    {
        $this->get('/posts/create')->assertRedirect('login');

        $post = make('App\Post');

        $this->post('/posts', $post->toArray())
            ->assertRedirect('login');
    }

    public function testAuthorizedUserCanCreatePost()
    {
        $this->signIn();

        $this->get('/posts/create')->assertStatus(200);

        Storage::fake('featured_images');
        $image = UploadedFile::fake()->image('test_image.jpeg');

        $post = Post::make([
            'author_id' => 1,
            'title' => 'title',
            'excerpt' => 'excerpt',
            'content' => 'content',
            'published_at' => now()
        ]);

        create('App\Tag', ['id' => 7, 'name' => 'Makayla Wiegand IV']);

        $this
            ->post(
                route('posts.store'),
                $post->toArray() + [
                    'featured_image' => $image,
                    'tags' => '[{"id":7,"name":"Makayla Wiegand IV"}]'
                ]
            )
            ->assertSessionHasNoErrors();

        Storage::disk('featured_images')
            ->assertExists('featured_images/' . $image->hashName());

        $this->assertDatabaseHas('posts', ['title' => $post->title]);

        $id = Post::first()->id;

        $this->get("/posts/$id")->assertSee($post->title);
    }

    public function testGuestCannotUpdatePost()
    {
        $post = create('App\Post', ['featured_image' => 'images/0aa186eb49f844476d7e2e9448f69496.jpg', ]);

        $this->get("/posts/$post->id/edit")->assertRedirect('login');

        $this
            ->patch(
                route('posts.update', $post->id),
                [
                    'title' => 'updated',
                    'excerpt' => 'excerpt',
                    'content' => 'content'
                ]
            )
            ->assertRedirect('login');
    }

    public function testAuthorizedUserCanUpdatePost()
    {
        $this->signIn();

        $post = create('App\Post', ['author_id' => auth()->id()]);

        $this->get("/posts/$post->id/edit")->assertStatus(200);

        $this->patch("/posts/$post->id", ['title' => 'updated', 'excerpt' => 'excerpt', 'content' => 'content'])->assertSessionHasNoErrors();

        $this->assertEquals('updated', $post->fresh()->title);
    }

    public function testGuestCannotDeletePost()
    {
        $post = create('App\Post');

        $this->delete("/posts/$post->id")->assertRedirect('login');
    }

    public function testAuthorizedUserCanDeletePost()
    {
        $this->signIn();

        $post = create('App\Post', ['author_id' => auth()->id()]);

        $this->assertDatabaseHas('posts', ['id' => $post->id]);

        $this->delete("/posts/$post->id");

        $this->assertCount(0, auth()->user()->fresh()->posts);
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}
