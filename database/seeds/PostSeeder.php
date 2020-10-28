<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = factory(App\Tag::class, 5)->create();
        $posts = factory(App\Post::class, 10)->create();
        $posts->first()->tags()->sync($tags);
    }
}
