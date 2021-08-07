<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bookmark;
use App\User;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Bookmark::class, function (Faker $faker) {
    return [
        'author_id' => factory(User::class),
        'post_id' => factory(Post::class)
    ];
});
