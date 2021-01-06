<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'author_id' => factory(User::class),
        'title' => $faker->sentence,
        'excerpt' => $faker->sentence,
        'content' => $faker->paragraph,
        'featured_image' => 'images/0aa186eb49f844476d7e2e9448f69496.jpg',
        'published_at' => date('Y-m-d\TH:i:s')
    ];
});
