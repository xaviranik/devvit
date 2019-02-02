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
Route::get('/', function () {
    return view('welcome');
});

// Auth
Auth::routes();

// Home
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {

    // Channels
    Route::resource('channels', 'ChannelsController');

    // Discussions
    Route::get('discussion/create', [
        'uses' => 'DiscussionsController@create',
        'as' => 'discussion.create'
    ]);
    Route::post('discussion/store', [
        'uses' => 'DiscussionsController@store',
        'as' => 'discussion.store'
    ]);
    Route::get('discussion/{slug}', [
        'uses' => 'DiscussionsController@show',
        'as' => 'discussion'
    ]);
    Route::post('discussion/reply/{id}', [
        'uses' => 'DiscussionsController@reply',
        'as' => 'discussion.reply'
    ]);
});
