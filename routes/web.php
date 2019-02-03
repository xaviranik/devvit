<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Welcome
Route::get('/', 'ForumsController@index')->name('forum');

// Auth
Auth::routes();

// Home
Route::get('/forum', 'ForumsController@index')->name('forum');

// Discussion without auth
Route::get('discussion/{slug}', [
    'uses' => 'DiscussionsController@show',
    'as' => 'discussion'
]);

// Channel wise discussion
Route::get('channel/{slug}', [
    'uses' => 'ForumsController@channel',
    'as' => 'channel'
]);

Route::group(['middleware' => 'auth'], function() {

    // Channels
    Route::resource('channels', 'ChannelsController');

    // Discussions with Auth
    Route::get('discussion/create/new', [
        'uses' => 'DiscussionsController@create',
        'as' => 'discussion.create'
    ]);
    Route::post('discussion/store', [
        'uses' => 'DiscussionsController@store',
        'as' => 'discussion.store'
    ]);
    Route::post('discussion/reply/{id}', [
        'uses' => 'DiscussionsController@reply',
        'as' => 'discussion.reply'
    ]);

    // Liking/Unliking
    Route::get('reply/like/{id}', [
        'uses' => 'RepliesController@like',
        'as' => 'reply.like'
    ]);
    Route::get('reply/unlike/{id}', [
        'uses' => 'RepliesController@unlike',
        'as' => 'reply.unlike'
    ]);

    // Watching/Unwatching
    Route::get('discussion/watch/{id}', [
        'uses' => 'WatchersController@watch',
        'as' => 'discussion.watch'
    ]);
    Route::get('discussion/unwatch/{id}', [
        'uses' => 'WatchersController@unwatch',
        'as' => 'discussion.unwatch'
    ]);

    // Marking best answer
    Route::get('reply/best/{id}', [
        'uses' => 'RepliesController@best_answer',
        'as' => 'reply.best.answer'
    ]);
});
