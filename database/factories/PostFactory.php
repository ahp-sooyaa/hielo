<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'author_id' => factory(App\User::class),
        'title' => $faker->sentence,
        'excerpt' => $faker->sentence,
        'content' => $faker->paragraph,
        'featured_image' => 'featured_images/' . $faker->image('public/storage/featured_images', 640, 480, null, false),
        'published_at' => date('Y-m-d\TH:i:s')
    ];
});
