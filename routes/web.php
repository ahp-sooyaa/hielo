<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

/* admin routes */
Route::group([
    'middleware' => 'Admin',
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/profile', 'ProfileController@show');
    Route::get('/profile/edit', 'ProfileController@edit');
    Route::patch('/profile/{user}', 'ProfileController@update');

    Route::get('/users', 'UsersController@index');
    Route::get('/users/create', 'UsersController@create');
    Route::post('/users', 'UsersController@store');
    Route::get('/users/{user}/edit', 'UsersController@edit');
    Route::patch('/users/{user}', 'UsersController@update');
    Route::delete('/users/{user}', 'UsersController@destroy');

    Route::get('/posts', 'PostsController@index');
    Route::get('/posts/create', 'PostsController@create');
    Route::post('/posts', 'PostsController@store');
    Route::get('/posts/{post}/edit', 'PostsController@edit');
    Route::patch('/posts/{post}', 'PostsController@update');
    Route::delete('/posts/{post}', 'PostsController@destroy');

    Route::get('/comments', 'CommentsController@index');
    Route::get('/comments/{comment}/edit', 'CommentsController@edit');
    Route::patch('/comments/{comment}', 'CommentsController@update');
    Route::delete('/comments/{comment}', 'CommentsController@destroy');

    Route::get('/roles', 'RolesController@index');
    Route::get('/roles/create', 'RolesController@create');
    Route::post('/roles', 'RolesController@store');
    Route::get('/roles/{role}/edit', 'RolesController@edit');
    Route::patch('/roles/{role}', 'RolesController@update');
    Route::delete('/roles/{role}', 'RolesController@destroy');

    Route::resource('abilities', 'AbilitiesController');

    Route::resource('tags', 'TagsController');

    Route::get('/reports', 'ReportsController@index');
});

// user routes
Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::get('/posts/create', 'PostsController@create')->name('posts.create');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');

Route::get('/notifications', 'UserNotificationsController@index')->name('notifications.index');
Route::delete('/{user}/notifications/{notifications}', 'UserNotificationsController@destroy')->name('notifications.destroy');

Route::group([
    'middleware' => ['auth', 'verified']
], function () {
    Route::get('/search', 'SearchController@show');

    Route::resource('posts', 'PostsController')->except(['index', 'show', 'create']);

    Route::get('/{user:name}/posts', 'AuthorPostsController'); // this could be like this author/{name}/posts

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

    Route::get('/{user:name}/readingList', 'ReadingListController@index');
    Route::post('/readingList/{postId}', 'ReadingListController@store');
    Route::delete('/readingList/{postId}', 'ReadingListController@destroy');
    Route::patch('/readingList/{postId}', 'ReadingListController@archieve');

    Route::get('/{user:name}/readingList/{collection:name}', 'ReadingListController@collection');
    Route::post('/{user:name}/collection', 'CollectionController@store');

    Route::post('/posts/{post}/likes', 'LikesController');

    Route::get('/posts/{post}/comments', 'PostCommentsController@index');
    Route::post('/posts/{post}/comment', 'PostCommentsController@store');
    Route::patch('/comments/{comment}', 'PostCommentsController@update');
    Route::delete('/comments/{comment}', 'PostCommentsController@destroy');

    Route::get('/userReports/{user}/create', 'UserReportsController@create');
    Route::post('/userReports/{user}', 'UserReportsController@store');

    Route::get('/postReports/{post}/create', 'PostReportsController@create');
    Route::post('/postReports/{post}', 'PostReportsController@store');
});

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('login/github', 'Auth\LoginController@redirectGithub');
Route::get('login/github/callback', 'Auth\LoginController@githubCallback');

Route::get('login/facebook', 'Auth\LoginController@redirectFacebook');
Route::get('login/facebook/callback', 'Auth\LoginController@facebookCallback');
