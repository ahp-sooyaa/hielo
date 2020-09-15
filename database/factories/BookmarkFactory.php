<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bookmark;
use Faker\Generator as Faker;

$factory->define(Bookmark::class, function (Faker $faker) {
    return [
        'author_id' => factory(App\User::class),
        'post_id' => factory(App\Post::class)
    ];
});
