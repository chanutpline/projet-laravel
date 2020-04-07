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
    //appelle la méthode show() quand l'accès à l'url /contacts se fait avec la méthode get
    Route::get('/','ContactController@show');
    //appelle la méthode create() quand l'accèse à l'url /contacts se fait avec la méthode post
    Route::post('/','ContactController@create')->name('post-contact');
});

Route::get('/articles','HomeController@articles');

Route::get('/articles/{post_name}','PostController@show');

Route::prefix('/rediger')->group(function(){
    Route::get('/','HomeController@nouvelArticle');
    Route::post('/','PostCrudController@create')->name('postRediger');
});
