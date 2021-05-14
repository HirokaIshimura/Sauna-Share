<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->paragraph,
        'picture_url' => $faker->imageUrl($width=640, $height=480, $category='cats', $randomize=true, $word=null),
        'user_id' => factory(App\User::class),
    ];
});
