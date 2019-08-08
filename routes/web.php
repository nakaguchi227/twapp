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

Route::get('/', function () {
    return redirect('/index');
});

Route::get('/index', 'TweetController@index')->name('tweet.index');
Route::get('/index/create', 'TweetController@create')->name('tweet.create');
Route::post('/index/store', 'TweetController@store')->name('tweet.store');

Route::post('/tweet/{id}', 'TweetController@destroy')->name('tweet.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{id}/index', 'CommentController@index')->name('comment.index');
Route::get('/{id}/create', 'CommentController@create')->name('comment.create');
Route::post('/{id}/store', 'CommentController@store')->name('comment.store');

Route::get('/user/{user_id}', 'UserController@index')->name('user.index');
Route::post('/like/{id}','UserController@like')->name('user.like');

Route::post('/like/{id}', 'LikeuserController@destroy')->name('like.destroy');
Route::post('/like/{id}/store', 'LikeuserController@store')->name('like.store');
