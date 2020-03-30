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

Route::get('/','HomeController@index');

/**
 * Contact Form Routes
 */
Route::prefix('/contact')->group(function() {
    Route::get('/','ContactController@show');
    Route::post('/','ContactController@create')->name('post-contact');
});

Route::get('/articles','HomeController@articles');

Route::get('/articles/{post_name}','PostController@show');


