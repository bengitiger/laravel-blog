<?php

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

Route::prefix('v1')->namespace('Api\V1')->group(function () {
    Route::middleware('auth:api')->group(function () {
        // Comments
        Route::resource('comments', 'CommentsController', ['only' => 'destroy']);
        Route::resource('posts.comments', 'PostCommentsController', ['only' => 'store']);

        // Posts
        Route::resource('posts', 'PostsController', ['only' => ['update', 'store', 'destroy']]);
        Route::delete('/posts/{post}/thumbnail', 'PostsThumbnailController@destroy')->name('posts.thumbnail.destroy');

        // Users
        Route::resource('users', 'UsersController', ['only' => 'update']);
    });

    // Comments
    Route::resource('posts.comments', 'PostCommentsController', ['only' => 'index']);
    Route::resource('users.comments', 'UserCommentsController', ['only' => 'index']);
    Route::resource('comments', 'CommentsController', ['only' => ['index', 'show']]);

    // Posts
    Route::resource('posts', 'PostsController', ['only' => ['index', 'show']]);
    Route::resource('users.posts', 'UserPostsController', ['only' => 'index']);

    // Users
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
});
