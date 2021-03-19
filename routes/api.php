<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Post;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('posts/avg-ratings', 'PostController@withAverageRating');
Route::get('users/{user}/posts', 'PostController@byUser');
Route::get('posts/{post}', 'PostController@withRatings');
Route::get('posts/rating/{rt}', 'PostController@withRatingAbove');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
