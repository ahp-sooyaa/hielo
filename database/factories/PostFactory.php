<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'author_id' => factory(App\User::class),
        'title' => $faker->sentence,
        'excerpt' => $faker->sentence,
        'content' => $faker->paragraph
    ];
});
