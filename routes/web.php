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



Route::namespace('Back')->prefix('admin')->middleware('admin')->group(function(){
      Route::get('home','Home@index')->name('admin.home');
      // Route::get('users','Users@index');
      // Route::get('users/create','Users@create');
      // Route::post('users','Users@store');
      // Route::get('users/{id}','Users@edit');
      // Route::post('users/{id}','Users@update');
      // Route::get('users/delete/{id}','Users@delete');

      Route::resource('users','Users')->except(['show']);
      Route::resource('categories','Categories')->except(['show']);
      Route::resource('skills','Skills')->except(['show']);
      Route::resource('tags','Tags')->except(['show']);
      Route::resource('pages','Pages')->except(['show']);
      Route::resource('videos','Videos')->except(['show']);
      Route::resource('messages','Messages')->only(['index','edit','destroy']);
      Route::post('messages/replay/{id}','Messages@replay')->name('message.replay');

      Route::post('comments','Videos@commentStore')->name('comments.store');
      Route::get('comments/{id}','Videos@commentDelete')->name('comments.delete');
      Route::post('comments/{id}','Videos@commentUpdate')->name('comments.update');




});

Route::middleware('auth')->group(function() {
    Route::post('comments/{id}', 'HomeController@commentUpdate')->name('front.commentUpdate');
    Route::post('comments/create/{id}', 'HomeController@commentStore')->name('front.commentStore');
    Route::post('profile', 'HomeController@profileUpdate')->name('profile.update');
});





Auth::routes();

Route::get('/','HomeController@welcome')->name('front.landing');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('category/{id}', 'HomeController@category')->name('front.category');
Route::get('skill/{id}', 'HomeController@skills')->name('front.skill');
Route::get('video/{id}', 'HomeController@video')->name('front.video');
Route::get('tag/{id}', 'HomeController@tags')->name('front.tags');
Route::post('contactUs', 'HomeController@messageStore')->name('contact.store');
Route::get('page/{id}/{slug?}', 'HomeController@page')->name('front.page');
Route::get('profile/{id}/{slug?}', 'HomeController@profile')->name('front.profile');







