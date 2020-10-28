<?php

use Illuminate\Database\Seeder;
use Tests\Feature\PostTagsTest;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            TagSeeder::class,
            BookmarkSeeder::class,
        ]);
    }
}
