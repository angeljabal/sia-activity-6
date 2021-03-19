<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rating;
use App\User;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Rating::class, function (Faker $faker) {
    $users = User::all()->pluck('id')->toArray();
    $posts = Post::all()->pluck('id')->toArray();

    return [
        'user_id'   => $faker->randomElement($users),
        'post_id'   => $faker->randomElement($posts),
        'rating'    => $faker->numberBetween(1,5),
    ];
});
