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

Route::post('/delete','PostController@delete')->name('delete');

Route::prefix('/update')->group(function (){
    Route::post('/','PostController@modifier')->name('update');
    Route::get('/','PostController@modifier2');
    Route::post('/1','PostController@update')->name('update1');


});
/**
 * Contact Form Routes
 */
Route::prefix('/contact')->group(function() {
    //appelle la méthode show() quand l'accès à l'url /contacts se fait avec la méthode get
    Route::get('/','ContactController@show');
    //appelle la méthode create() quand l'accèse à l'url /contacts se fait avec la méthode post
    Route::post('/','ContactController@create')->name('post-contact');
});

Route::prefix('/articles')->group(function() {
    Route::get('/','HomeController@articles');
    Route::get('/{post_name}','PostController@show');
});

Route::prefix('/comments')->group(function() {
    Route::post('','CommentsController@create')->name('un-article-post');
});

Route::prefix('/rediger')->group(function(){
    Route::get('/','HomeController@nouvelArticle');
    Route::post('/','PostController@create')->name('postRediger');
});


Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
 
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');