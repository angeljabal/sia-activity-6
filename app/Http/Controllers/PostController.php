<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Rating;

class PostController extends Controller
{
    /**
     * Returns all the post from a given user (include user data)
     * Route: /users/{user}/posts	
     */
    public function byUser(User $user){
        return User::with('posts')->where('id', $user->id)->get();
    }

    /**
     * Returns a single post but will include all of its ratings
     * Route: /posts/{post}	
     */

    public function withRatings(Post $post){
        return Post::with('ratings')->where('posts.id', $post->id)->get();
    }

    /**
     * Returns all the posts including average rating of each post
     * Route: /posts/avg-ratings	
     */

    public function withAverageRating(){
        $data = Post::query()
            ->select('posts.id', 'posts.post', \DB::raw('AVG(ratings.rating) as averageRating'))
            ->leftJoin('ratings', 'ratings.post_id', 'posts.id')
            ->groupBy('posts.id', 'posts.post')->get();
        return $data;
    }

    /**
     * Returns All the posts whose rating is above {rt}
     * Route: /posts/rating/{rt}	
     */

    public function withRatingAbove($rt){
        $data = Post::join('ratings', 'posts.id', '=', 'ratings.post_id')
                    ->where('ratings.rating', '>', $rt)
                    ->orderBy('ratings.rating')
                    ->get();

        return $data;
    }
}
