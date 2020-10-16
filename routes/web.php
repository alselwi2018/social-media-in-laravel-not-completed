<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show')->middleware('web');

Auth::routes();
Route::resource('post', 'PostController');
Route::get('/post/comment/{post}', 'PostController@comment');
Route::resource('side', 'SideController');
Route::resource('/comment', 'CommentController');


Route::get('/p/Picture','ProfilesController@user_picture');
Route::post('/profileavatar','ProfilesController@update_avatar')->name('ImageUpdate');
