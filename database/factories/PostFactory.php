<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $users = User::all()->pluck('id')->toArray();

    return [
        'user_id'   => $faker->randomElement($users),
        'post'      => $faker->text,
        'tags'      => $faker->word,
    ];
});
