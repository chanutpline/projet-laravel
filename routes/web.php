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
    Route::post('/', 'PostController@create')->name('postRediger');
});

Route::prefix('/register')->group(function (){
    // Display a form to a visitor so they can register for a new account with the site.
    Route::get('/', 'RegistrationController@create');
    // Accepts request data from the registration form submission, validates data, stores new user in the database.
    Route::post('/', 'RegistrationController@store');
});

Route::prefix('/login')->group(function(){
    // Display a form for an existing user to log in to the site and establish a new session.
    Route::get('/', 'SessionController@create');
    // Accepts request data from log in (or session) form submission, authorizes credentials, logs user into the site.
    Route::post('/', 'SessionController@store');
});

// Destroys an existing session and logs the user out of the site.
Route::get('/logout', 'SessionController@destroy');


// the $provider is whether google or github depends on the button where the user is gonna click
Route::get('/register/{provider}', 'RegistrationController@redirectToProvider');
Route::get('/register/google/callback', 'RegistrationController@handleProviderCallbackGoogle');
Route::get('/register/github/callback', 'RegistrationController@handleProviderCallbackGithub');

Route::get('/phpinfo', function() {
    return phpinfo();
});

