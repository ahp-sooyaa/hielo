<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('login/github', 'Auth\LoginController@redirectGithub');
Route::get('login/github/callback', 'Auth\LoginController@githubCallback');

Route::get('login/facebook', 'Auth\LoginController@redirectFacebook');
Route::get('login/facebook/callback', 'Auth\LoginController@facebookCallback');

/* admin routes */
Route::group(['middleware' => ['auth', 'Admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', 'Admin\DashboardController@index');
    /* admin account */
    Route::get('/profile', 'Admin\ProfileController@show');
    Route::get('/profile/edit', 'Admin\ProfileController@edit');
    Route::patch('/profile/{user}', 'Admin\ProfileController@update');

    /* users routes */
    Route::get('/users', 'Admin\UsersController@index');
    Route::get('/users/create', 'Admin\UsersController@create');
    Route::post('/users', 'Admin\UsersController@store');
    Route::get('/users/{user}/edit', 'Admin\UsersController@edit');
    Route::patch('/users/{user}', 'Admin\UsersController@update');
    Route::delete('/users/{user}', 'Admin\UsersController@destroy');

    /* posts routes */
    Route::get('/posts', 'Admin\PostsController@index');
    Route::get('/posts/create', 'Admin\PostsController@create');
    Route::post('/posts', 'Admin\PostsController@store');
    Route::get('/posts/{post}/edit', 'Admin\PostsController@edit');
    Route::patch('/posts/{post}', 'Admin\PostsController@update');
    Route::delete('/posts/{post}', 'Admin\PostsController@destroy');

    /* comments routes */
    Route::get('/comments', 'Admin\CommentsController@index');
    Route::get('/comments/{comment}/edit', 'Admin\CommentsController@edit');
    Route::patch('/comments/{comment}', 'Admin\CommentsController@update');
    Route::delete('/comments/{comment}', 'Admin\CommentsController@destroy');

    /* roles routes */
    Route::get('/roles', 'Admin\RolesController@index');
    Route::get('/roles/create', 'Admin\RolesController@create');
    Route::post('/roles', 'Admin\RolesController@store');
    Route::get('/roles/{role}/edit', 'Admin\RolesController@edit');
    Route::patch('/roles/{role}', 'Admin\RolesController@update');
    Route::delete('/roles/{role}', 'Admin\RolesController@destroy');

    /* abilities routes */
    Route::resource('abilities', 'Admin\AbilitiesController');

    /* tags routes */
    Route::resource('tags', 'Admin\TagsController');

    /* reports routes */
    Route::get('/reports', 'Admin\ReportsController@index');
});

/* user routes */
// Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'verified'], function () {
        Route::get('/search', 'SearchController@show');

        Route::resource('posts', 'PostsController');
        /* user profile */
        Route::get('profiles/{user:name}', 'ProfilesController@show');
        Route::get('profiles/{user:name}/edit', 'ProfilesController@edit');
        Route::patch('profiles/{user:name}', 'ProfilesController@update');
        Route::get('profiles/{user:name}/likes', 'ProfilesController@likes');
        Route::get('profiles/{user:name}/comments', 'ProfilesController@comments');

        Route::patch('/{user:name}/password', 'UserPasswordController@update');

        Route::post('/{user:name}/follow', 'FollowsController@store');
        Route::get('/{user:name}/follow', 'FollowsController@index');
        Route::get('/{user:name}/following', 'FollowsController@following');
        Route::get('/{user:name}/follower', 'FollowsController@follower');

        /* readingList */
        Route::get('/{user:name}/readingList', 'ReadingListController@index');
        Route::post('/readingList/{postId}', 'ReadingListController@store');
        Route::delete('/readingList/{postId}', 'ReadingListController@destroy');
        Route::patch('/readingList/{postId}', 'ReadingListController@archieve');

        Route::get('/{user:name}/readingList/{collection:name}', 'ReadingListController@collection');
        Route::post('/{user:name}/collection', 'CollectionController@store');

        /* individual user posts */
        Route::get('/{user:name}/posts', 'AuthorPostsController');

        /* post like routes */
        Route::post('/posts/{post}/likes', 'LikesController');

        /* post comments routes */
        Route::post('/posts/{post}/comment', 'PostCommentsController@store');
        Route::patch('/comments/{comment}', 'PostCommentsController@update');
        Route::delete('/comments/{comment}', 'PostCommentsController@destroy');

        /* report routes */
        Route::get('/userReports/{user}/create', 'UserReportsController@create');
        Route::post('/userReports/{user}', 'UserReportsController@store');

        Route::get('/postReports/{post}/create', 'PostReportsController@create');
        Route::post('/postReports/{post}', 'PostReportsController@store');
    });
    /* notifications */
    Route::get('/notifications', 'UserNotificationsController@index');
    Route::delete('/{user}/notifications/{notifications}', 'UserNotificationsController@destroy');

    /* home */
    Route::get('/home', 'HomeController@index')->name('home');
});
